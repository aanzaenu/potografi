<?php

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

Auth::routes([
    'reset' => false
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/json/getphonebrand', 'HomeController@getphonebrand')->name('json.getphonebrand');
Route::post('/json/getphone', 'AjaxController@getphone')->name('json.getphone');
Route::resource('/user','UserController', ['except' => ['show', 'add', 'store']]);
Route::resource('/images','ImageController', ['except' => ['show']]);
