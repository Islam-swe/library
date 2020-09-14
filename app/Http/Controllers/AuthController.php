<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{

    //display registeration form
    function register()
    {
        return view('auth.register');
    }


    //handle registeration fom (validate and create in db)
    function handleRegister(Request $request)
    {
        $request->validate
        (
            [
                'name'=>'required|string|max:100',
                'email'=>'required|email|max:100',
                'password'=>'required|string|min:6|max:50'
            ]
        );
        
        $user=User::create
        (
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)
            ]
        );

        //login
        Auth::login($user);
        return redirect(route('allbooks'));

    }

    //display registeration form
    function login()
    {
        return view('auth.login');
    }


    //handle registeration fom (validate and create in db)
    function handleLogin(Request $request)
    {
        $request->validate
        (
            [
                'email'=>'required|email|max:100',
                'password'=>'required|string|min:6|max:50'
            ]
        );
     

        $is_login=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
       
        
        if(!$is_login)
        {
           return back();
        }
        return redirect(route('allbooks'));

    }

    //logout

    function logout()
    {
        Auth::logout();
        return redirect(route('auth.login'));
    }



    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $db_user=User::where('email','=',"$user->email")->first();


        if($db_user==null)
        {
            $registered_user=User::create
            ([
                'name'=>$user->name,
                'email'=>$user->email,
                'password'=>Hash::make('123456'),
                'oauth_token'=>$user->token,
            ]); 
            Auth::login($registered_user);
        }
        else{
         Auth::login($db_user);   
        }

           return redirect(route('allbooks')); 
        

    } 



}
