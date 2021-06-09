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
Route::get('/index',function(){
    return view('Prueba.index1');
})->name('index');
Route::get('/forms',function(){
    return view('Prueba.forms');
})->name('forms');
Route::get('/prueba',function(){
    return view('Prueba.prueba');
})->name('prueba');

Route::get('/registro', 'Auth\RegisterController@index')->name('registro');
Route::post('/registro', 'Auth\RegisterController@register')->name('register_post');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
