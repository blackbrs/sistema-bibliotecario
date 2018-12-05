<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusquedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singleSearch(Request $request)
    {
       // if(empty($request->get('query')){}
        if($request->get('query')=='FalconHeavy'){return redirect('https://youtu.be/wbSwFU6tY1c?t=1309');}
        
        return view('recursos.resultados');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advSearch()
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
}
    /**
   * Display the specified resource
