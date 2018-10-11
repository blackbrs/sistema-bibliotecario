<?php

use Illuminate\Http\Request;

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
        $data= $request->get('dep');
    return datatables()->eloquent(\App\User::whereHas('municipio',function($q) use ($data){
        $q->where('dep_id',$data);
    }))
    ->toJson();
    }else{
    //Se puede iniciar la tabla con todos los registros 
    //Este espacio es para $request sin ajax
    //Siempre con render serverside de DTables
    }
});

