<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('ApiIsUser')->group(function(){
    //all books
    Route::get('/books','ApiBookController@index');
    //one book
    Route::get('/books/show/{id}','ApiBookController@show');
});

//is admin middleware
Route::middleware('ApiIsAdmin')->group(function(){
    Route::post('/books/store','ApiBookController@store');
    //update
    Route::post('/books/update/{id}','ApiBookController@update');
    //delete
    Route::get('/books/delete/{id}','ApiBookController@delete');
});
//stor book in db


//User Auth
Route::post('/register','ApiAuthController@register');
Route::post('/login','ApiAuthController@login');
Route::post('/logout','ApiAuthController@logout');