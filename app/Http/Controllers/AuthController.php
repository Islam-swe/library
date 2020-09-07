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
                'pass'=>'required|string|min:6|max:50'
            ]
        );
        $user=User::create
        (
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'pass'=>Hash::make($request->pass)
            ]
        );

        //login
        Auth::login($user);
        return redirect(route('allbooks'));

    }








}
