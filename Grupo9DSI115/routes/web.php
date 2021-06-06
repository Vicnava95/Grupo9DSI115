<?php

use Illuminate\Support\Facades\Route;
use App\Sexo;
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
    /*Sexo::firstOrCreate(['nombre'=>'masculino']);
    Sexo::firstOrCreate(['nombre'=>'Femenino']);*/
    return view('Base.prueba');
})->name('index');
Route::get('/forms',function(){
    return view('Prueba.forms');
})->name('forms');
Route::get('/prueba',function(){
    return view('Prueba.prueba');
})->name('prueba');

//php artisan route:list --name=pacientes
//para visualizar los nombres de las rutas
Route::resource('pacientes', 'PacienteController');
//Route::get('/registro', 'Auth\RegisterController@index')->name('register');
//Route::post('/register', 'RegisterController@register')->name('register_post');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
