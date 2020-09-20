<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
class ApiAuthController extends Controller
{
    //Register
    function register(Request $request)
    {
        //validation
        $validator=Validator::make($request->all(),[
            'email'=>'required|email|max:100',
            'password'=>'required|string|min:6|max:50'
        ]);
        if($validator->fails()){
            $errors=$validator->errors();
            return response()->json($errors);
        }

        $user=User::where('email',$request->email)->first();
        if(isset($user))
        {
            return response()->json("already exists email");

        }
        
        $user=User::create
            ([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'access_token'=>Str::random(64)
            ]);
        
        return response()->json($user->access_token);
       
    }

    //login
    function login(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'email'=>'required|email|max:100',
            'password'=>'required|string|min:6|max:50'
        ]);
        $user=User::where('email',$request->email)->first();

        if(!$user)
        {
            return response()->json('not registered email');
        }
        if(!Hash::check($request->password, $user->password))
        {
            return response()->json('not correct password');    
        }
        $user->access_token=Str::random(64);
        $user->save();
        return response()->json($user);
        
    }

    //logout
    function logout(Request $request)
    {
        $user=User::where('access_token',$request->access_token)->first();
        $user->update([ 'access_token'=>Null]);
        return response()->json('deleted successfully');

    }






}
