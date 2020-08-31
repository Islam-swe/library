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

//Book:read
Route::get('/books','BookController@index')->name('allbooks');
Route::get('show/{id}', 'BookController@show')->name('onebook');


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