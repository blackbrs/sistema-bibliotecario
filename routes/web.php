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

// RUTAS que tendran como requisitos almenos estar loggeados
Route::middleware(['auth'])->group(function () {
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
    Route::get('/stats/users', function () {return view('stats.users'); })->name('users.stats')->middleware('permission:users.stats');
    //Recursos
    Route::get('/recursos','RecursoController@index')->name('recursos.index');
    Route::get('upload', 'HomeController@upload')->name('upload');
    Route::post('upload', 'HomeController@uploadPost');
    Route::get('/recurso/create/p1', 'RecursoController@createP1')->name('recursos.create');
    Route::post('/recurso/create/p1', 'RecursoController@postCreateP1');
    Route::get('/recurso/create/p2', 'RecursoController@createP2');
    Route::post('/recurso/create/p2', 'RecursoController@postCreateP2');
    Route::put('/recursos/{recurso}','RecursoController@update')->name('recurso.update');
    Route::get('/recursos/{recurso}','RecursoController@show')->name('recurso.show');
    Route::get('/recursos/{recurso}/edit','RecursoController@edit')->name('recurso.edit');
    Route::delete('/recursos/{recurso}','RecursoController@destroy')->name('recurso.destroy');
    Route::get('/cancelar/recurso/p1','RecursoController@cancelarP1')->name('recursos.cancelar.p1');
    Route::get('/cancelar/recurso/p2','RecursoController@cancelarP2')->name('recursos.cancelar.p2');
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

/****************************************  AUTORES*****************************************************/

Route::post('autors/store', 'AutorController@store')->name('autors.store')
        ->middleware('permission:autors.create');

Route::get('autors', 'AutorController@index')->name('autors.index')
        ->middleware('permission:autors.index');

Route::get('autors/create', 'AutorController@create')->name('autors.create')
       ->middleware('permission:autors.create');

Route::put('autors/{autor}', 'AutorController@update')->name('autors.update')
        ->middleware('permission:autors.edit');

Route::get('autors/{autor}', 'AutorController@show')->name('autors.show')
        ->middleware('permission:autors.show');

Route::delete('autors/{autor}', 'AutorController@destroy')->name('autors.destroy')
        ->middleware('permission:autors.destroy');

Route::get('autors/{autor}/edit', 'AutorController@edit')->name('autors.edit')
        ->middleware('permission:autors.edit');

/***************************************************Editoriales.**************************************************/
Route::post('editorials/store', 'EditorialController@store')->name('editorials.store')
        ->middleware('permission:editorials.create');

Route::get('editorials', 'EditorialController@index')->name('editorials.index')
        ->middleware('permission:editorials.index');

Route::get('editorials/create', 'EditorialController@create')->name('editorials.create')
       ->middleware('permission:editorials.create');

Route::put('editorials/{editorial}', 'EditorialController@update')->name('editorials.update')
        ->middleware('permission:editorials.edit');

Route::get('editorials/{editorial}', 'EditorialController@show')->name('editorials.show')
        ->middleware('permission:editorials.show');

Route::delete('editorials/{editorial}', 'EditorialController@destroy')->name('editorials.destroy')
        ->middleware('permission:editotials.destroy');

Route::get('editorials/{editorial}/edit', 'EditorialController@edit')->name('editorials.edit')
        ->middleware('permission:editorials.edit');
