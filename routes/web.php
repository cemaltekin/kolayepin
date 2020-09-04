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
Route::get('/admin','AdminController@index');
Route::get('/users' , 'AdminController@indexview');
Route::get('/delete/{id}','AdminController@delete')->where(array('id'=>'[0-9]+'));
Route::get('/register' , 'AdminController@register');
Route::post('/create', 'AdminController@create');
Route::get('/update/{id}', 'AdminController@updateView')->where(array('id' => '[0-9]+'));
Route::post('/update/{id}', 'AdminController@update')->where(array('id' => '[0-9]+'));