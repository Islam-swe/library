<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//SET LANGUAGE
Route::group(['middleware' => ['setLang']], function () {
    //Book:read
    Route::get('/books','BookController@index')->name('allbooks');
    Route::get('show/{id}','BookController@show')->name('onebook');
    Route::get('/books/search/','BookController@search')->name('books.search');


    //middleware for admins only to create,edit and delete
    Route::middleware('isAdmin')->group(function(){
        //Book:create
        Route::get('books/create','BookController@create')->name('books.create');
        //Book:store
        Route::post('books/store','BookController@store')->name('books.store');

        //Book:edit
        Route::get('books/edit/{id}','BookController@edit')->name('books.edit');
        //Book:update
        Route::post('books/update/{id}','BookController@update')->name('books.update');

        //Book:delete
        Route::get('books/delete/{id}','BookController@delete')->name('books.delete');
        //=================================================================

        //===================not auth
        Route::get('/notauth', function()
        {
            return "you are not auth";
        });


        //Category:create
        Route::get('categories/create','CategoryController@create')->name('categories.create');
        //Category:store
        Route::post('categories/store','CategoryController@store')->name('categories.store');

        //Category:edit
        Route::get('categories/edit/{id}','CategoryController@edit')->name('categories.edit');
        //Category:update
        Route::post('categories/update/{id}','CategoryController@update')->name('categories.update');

        //Category:delete
        Route::get('categories/delete/{id}','CategoryController@delete')->name('categories.delete');

        //Notes
        Route::post('notes/store','NoteContrller@store')->name('notes.store');
    });

    Route::middleware('isLogin')->group(function(){
        //logout    
        Route::get('/logout', 'AuthController@logout')->name('auth.logout');
        //notes
        Route::get('/notes/create','NoteController@create')->name('notes.create');
        Route::post('/notes/store','NoteController@store')->name('notes.store');

    });
    


    //Category:read
    Route::get('/categories','CategoryController@index')->name('categories.index');
    Route::get('category/{id}', 'CategoryController@show')->name('categories.show');



    //middle ware if only guest can access register and login pages
    Route::middleware('isGuest')->group(function(){
        //Auth
        //Registeration
        Route::get('/register', 'AuthController@register')->name('auth.register');
        Route::post('/handle-register', 'AuthController@handleRegister')->name('auth.handleRegister');
        //Login
        Route::get('/login', 'AuthController@login')->name('auth.login');
        Route::post('/handle-login', 'AuthController@handlelogin')->name('auth.handleLogin');

        Route::get('login/github', 'AuthController@redirectToProvider')->name('auth.github.redirect');
        Route::get('login/github/callback','AuthController@handleProviderCallback')->name('auth.github.callback');

    });


    Route::get('lang/en','LangController@en')->name('lang.en');
    Route::get('lang/ar','LangController@ar')->name('lang.ar');
});
