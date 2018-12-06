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
       if(empty($request->get('query'))){
           return back()->with('fail','No ha introducido ningun termino en el cuadro de busqueda');
       }
        if($request->get('query')=='FalconHeavy'){return redirect('https://youtu.be/wbSwFU6tY1c?t=1309'); }//Easter Egg :D
        else{
            $spx=$request->get('query');
            $recursos = \App\Recurso::where('titulo', 'LIKE', '%'.$spx.'%')
            ->orWhere('principal', 'LIKE', '%'.$spx.'%')
            ->orWhere('categoria', 'LIKE', '%'.$spx.'%')
            ->orWhere('genero', 'LIKE', '%'.$spx.'%')
            ->get();
            if(!($recursos->count())){return back()->with('fail','No se encontraron recursos acordes a su busqueda');}
        }
        return view('recursos.resultados', compact('recursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function advSearch()
    {
        return back()->with('info','La buqueda avanzada aun no ha sido implementada :(');
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
