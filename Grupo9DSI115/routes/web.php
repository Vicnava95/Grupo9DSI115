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
/* Route::get('/', function () {
    return view('welcome');
}); */
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

Route::get('/registro', 'Auth\RegisterController@index')->name('registro');
Route::post('/registro', 'Auth\RegisterController@register')->name('register_post');
//php artisan route:list --name=pacientes
//para visualizar los nombres de las rutas
Route::resource('usuarios','UserController');
Route::get('usuarios/{usuario}/borrar', 'UserController@delete')->name('usuarios.delete');
Auth::routes();
//Route::resource('pacientes', 'PacienteController');
Route::resource('sexos', 'SexoController');
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Solo Admin y secretaria
Route::resource('pacientes', 'PacienteController')->middleware('App\Http\Middleware\SecretariaMiddleware','App\Http\Middleware\AdminMiddleware');
Route::get('pacientes/{paciente}/borrar', 'PacienteController@delete')->name('pacientes.delete');
Auth::routes();

Route::middleware(['auth'])->group(function (){

    Route::get('/prueba',function(){
        return view('Prueba.prueba');
    })->name('prueba');
    

    //Rutas asignadas para el Administrador
    Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'],function(){
        Route::get('/admin',function(){
            return view('Prueba.admin');
        })->name('admin');

        Route::resource('usuarios','UserController');
    });

    //Rutas asignadas para el Doctor General
    Route::group(['middleware' => 'App\Http\Middleware\DoctorGeneralMiddleware'],function(){
        Route::get('/doctorGeneral',function(){
            return view('Prueba.doctorGeneral');
        })->name('doctorGeneral');
    });
    //Rutas asignadas para la Doctora Dental
    Route::group(['middleware' => 'App\Http\Middleware\DoctoraDentalMiddleware'],function(){
        Route::get('/doctoraDental',function(){
            return view('Prueba.doctoraDental');
        })->name('doctoraDental');
        
    });
    //Rutas asignadas para la secretaria
    Route::group(['middleware' => 'App\Http\Middleware\SecretariaMiddleware'],function(){
        Route::get('/secretaria',function(){
            return view('Prueba.secretaria');
        })->name('secretaria');
    });

});

/* Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'],function(){
    Route::get('/admin',function(){
        return view('Prueba.admin');
    })->name('admin');
}); */

