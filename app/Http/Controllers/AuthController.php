<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

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
        return back();
    }








}
