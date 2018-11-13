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
Route::post('/stats', function (Request $request) {
    if($request->ajax()){
        $data= $request->get('dep');
        
        $q= DB::table('users')->join('municipios','users.municipio_id','=','municipios.id')->where(function($q) use ($data){$q->where('municipios.dep_id',$data);});
    return datatables()->of($q)->toJson();
    }else{
    //Se puede iniciar la tabla con todos los registros 
    //Este espacio es para $request sin ajax
    //Siempre con render serverside de DTables
    }
});

