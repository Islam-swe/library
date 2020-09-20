<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class LangController extends Controller
{
    public function en()
    {
        App::setlocale('en');
        Session::put('lang','en');
        return back();
    }

    public function ar()
    {
        App::setlocale('ar');
        Session::put('lang','ar');
        return back();
    }
    
}
