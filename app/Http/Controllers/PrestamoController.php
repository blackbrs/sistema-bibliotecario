<?php

namespace App\Http\Controllers;

use App\prestamo;
use App\User;
use Illuminate\Http\Request;
use DateTime;


class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($numero)
    {
        $p = prestamo::where('biblioteca_id', $numero)->where('prestamoActivo',TRUE)->get();
           $hoy = new DateTime();
           foreach($p as $prestamo){

                $dia_prestamo = new DateTime($prestamo->created_at);
                $interval = $hoy->diff($dia_prestamo);
                $dias = $interval->format('%a');
                if($dias==0){$dias=1;}
                $prestamo->diasPrestado = $dias;
                $prestamo->save();
           }
         $prest = prestamo::where('biblioteca_id', $numero)->paginate(10);
         return view('prestamos.index', compact('prest'));
    }

    public function indexPersonal($numero)
    {
        $p = prestamo::where('user_id', $numero)->where('prestamoActivo',TRUE)->get();
        $hoy = new DateTime();
        foreach($p as $prestamo){

             $dia_prestamo = new DateTime($prestamo->created_at);
             $interval = $hoy->diff($dia_prestamo);
             $dias = $interval->format('%a');
             if($dias==0){$dias=1;}
             $prestamo->diasPrestado = $dias;
             $prestamo->save();
        }
        $prest = prestamo::where('user_id', $numero)->paginate(10);
        return view('prestamos.index', compact('prest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(prestamo $prestamo)
    {
        //
    }
    private function checkTime(){
        
    }
}
