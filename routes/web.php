<?php

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

Auth::routes();
Route::post('getmunicipio/fetch', 'DepartamentoController@getMunicipios');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/upload', 'HomeController@uploadPost');
Route::get('/upload', 'HomeController@upload');
// RUTAS que tendran como requisitos almenos estar loggeados
Route::middleware(['auth'])->group(function(){  
  
    //roles

Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');

Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

Route::get('roles/create', 'RoleController@create')->name('roles.create')
       ->middleware('permission:roles.create');

Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');

// Route::get('/roles/create/fetch', 'RoleController@fetch'); Paginacion con AJAX

//Usuarios


Route::get('users', 'UserController@index')->name('users.index')
        ->middleware('permission:users.index');

Route::put('users/{user}', 'UserController@update')->name('users.update')
        ->middleware('permission:users.edit');

Route::get('users/{user}', 'UserController@show')->name('users.show')
        ->middleware('permission:users.show');

Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');

//Estadisticas
Route::get('stats', function(){return view('stats');})->name('stats')->middleware('permission:users.stats');

//Recursos

Route::get('/recurso/create/p1','RecursoController@createP1');
Route::post('/recurso/create/p1','RecursoController@postCreateP1');
Route::get('/recurso/create/p2', 'RecursoController@createP2');
Route::post('/recurso/create/p2', 'RecursoController@postCreateP2');
Route::get('/recurso/create/p3', 'RecursoController@createP3');
Route::post('/recurso/store', 'RecursoController@store');
});

//Bibliotecas

Route::post('bibliotecas/store', 'BibliotecaController@store')->name('bibliotecas.store')
        ->middleware('permission:bibliotecas.create');

Route::get('bibliotecas', 'BibliotecaController@index')->name('bibliotecas.index')
        ->middleware('permission:bibliotecas.index');

Route::get('bibliotecas/create', 'BibliotecaController@create')->name('bibliotecas.create')
       ->middleware('permission:bibliotecas.create');

Route::put('biliotecas/{biblioteca}', 'BibliotecaController@update')->name('bibliotecas.update')
        ->middleware('permission:bibliotecas.edit');

Route::get('bibliotecas/{biblioteca}', 'BibliotecaController@show')->name('bibliotecas.show')
        ->middleware('permission:bibliotecas.show');

Route::delete('bibliotecas/{biblioteca}', 'BibliotecaController@destroy')->name('bibliotecas.destroy')
        ->middleware('permission:bibliotecas.destroy');

Route::get('bibliotecas/{biblioteca}/edit', 'BibliotecaController@edit')->name('bibliotecas.edit')
        ->middleware('permission:bibliotecas.edit');
