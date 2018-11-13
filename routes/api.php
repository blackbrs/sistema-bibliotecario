<?php

use Illuminate\Http\Request;
use \App\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/stats', function (Request $request) {
    if($request->ajax()){
    return datatables(User::join('municipios','users.municipio_id','=','municipios.id')
           ->where('municipios.dep_id',$request->get('dep')))
           ->toJson();
    }else{//Este espacio es para $request sin ajax - Se puede iniciar la tabla con todos los registros 
    }
});

