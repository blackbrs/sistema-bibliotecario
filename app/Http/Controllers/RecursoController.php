<?php

namespace App\Http\Controllers;

use App\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createP1(Request $request)
    {
        $recurso = $request->session()->get('recurso');
        $rselect = $request->session()->get('rselect');
        return view('recursos.create',compact('recurso', 'rselect'));
    }
    public function postCreateP1(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required',
            'año' => 'required|numeric',
            'autor' => 'required',
            'categoria' => 'required',
            'genero' => 'required',
            'descripcion' => 'required|string|max:255',
            "principal" => 'required',
        ]);
        if(empty($request->session()->get('recurso'))){

            $recurso = new Recurso();
            $rselect = $request->get('recursoRB');
            $recurso->fill($validatedData);
            $request->session()->put('recurso', $recurso);
            $request->session()->put('rselect', $rselect);
        }else{
            $recurso = $request->session()->get('recurso');
            $recurso->fill($validatedData);
            $recurso->versionDigital = true;
            $recurso->save();
            $rselect = $request->get('recursoRB');
            $request->session()->put('recurso', $recurso);
            $request->session()->put('rselect', $rselect);

        }

        return redirect('/recurso/create/p2');
    }
    public function createP2()
    {
        //
    }
    public function postCreateP2()
    {
        //
    }
    public function createP3()
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
     * @param  \App\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function show(Recursos $recursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function edit(Recursos $recursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recursos $recursos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recursos $recursos)
    {
        //
    }
}
