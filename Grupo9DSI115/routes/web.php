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
//Route::resource('usuarios','UserController');

//Route::resource('pacientes', 'PacienteController');
Route::resource('sexos', 'SexoController');

Route::get('/', 'HomeController@index')->name('home');
//Solo Admin y secretaria
Auth::routes();
Route::middleware(['auth'])->group(function (){

    /******* INICIO RUTAS COMPARTIDAS ********************/
    /******* El único requisito es que este logeado ****/
    Route::get('/prueba',function(){
        return view('Prueba.prueba');
    })->name('prueba');
    Route::resource('pacientes', 'PacienteController');
    Route::get('pacientes/{paciente}/borrar', 'PacienteController@delete')->name('pacientes.delete');
    Route::resource('personas', 'PersonaController');
    Route::resource('rolpersonas', 'RolpersonaController');
    Route::get('rolpersonas/{rolpersona}/borrar', 'RolpersonaController@delete')->name('rolpersonas.delete');
    //CRUD citas (TODOS PUEDEN)  Tomar en cuenta que los dos doctores pueden tener cita a la misma hora pero no el mismo paciente
    //Mostrar las citas del día para los dos doctores

    /******** FIN RUTAS COMPARTIDAS *********************/
    

    //Rutas asignadas para el Administrador (Admin, Doctor General, Doctora Dental)
    //Todos ellos pueden entrar menos la secretaria 
    Route::group(['middleware' => 'AdminMiddleware'],function(){
        Route::get('/admin',function(){
            return view('Prueba.admin');
        })->name('admin');
        Route::resource('usuarios','UserController');
        Route::get('usuarios/{usuario}/borrar', 'UserController@delete')->name('usuarios.delete');
    });

    //Rutas asignadas para el Doctor General (SOLO PARA EL DOCTOR)
    Route::group(['middleware' => 'DoctorGeneralMiddleware'],function(){
        Route::get('/doctorGeneral',function(){
            return view('Prueba.doctorGeneral');
        })->name('doctorGeneral');
    });

    //Rutas asignadas para la Doctora Dental (SOLO PARA LA DOCTORA)
    Route::group(['middleware' => 'DoctoraDentalMiddleware'],function(){
        Route::get('/doctoraDental',function(){
            return view('Prueba.doctoraDental');
        })->name('doctoraDental');
        
    });

    //Rutas asignadas para la secretaria (SOLO PARA LA SECRETARIA)
    Route::group(['middleware' => ['SecretariaMiddleware']], function () {
        Route::get('/secretaria',function(){
            return view('Prueba.secretaria');
        })->name('secretaria');    
    });
}); 

