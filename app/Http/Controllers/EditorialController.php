<?php

namespace App\Http\Controllers;

use App\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editorial = Editorial::paginate();

        return view('editorials.index', compact('editorial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editorials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $editorial = Editorial::create($request->all());
        $editorial2 = Editorial::paginate();

        return redirect()->route('editorials.index', $editorial2)
        ->with('info', 'editorial guardado con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\editorial $editorial
     *
     * @return \Illuminate\Http\Response
     */
    public function show(editorial $editorial)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\editorial $editorial
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(editorial $editorial)
    {
        return view('editorials.edit', compact('editorial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\editorial           $editorial
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, editorial $editorial)
    {
        $editorial->update($request->all());
        $editorial2 = Editorial::paginate();

        return redirect()->route('editorials.index', $editorial2)
        ->with('info', 'editorial actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\editorial $editorial
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(editorial $editorial)
    {
        $editorial->delete();

        return back()->with('info', 'editorial Eliminado con exito');
    }
}
