<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->user()->isRole('admin')){
            return view('stats');
        }
        else return view('home');
    }
    public function upload(){
        return view('upload');
    }
    public function uploadPost(Request $request){
        $request->validate([
            'fileToUpload' => 'required|file|max:46000',
        ]);
        $nombre = definirNombre($request);
        $request->fileToUpload->storeAs('thumbs',$nombre);

        return back()
            ->with('success','Archivo subido con exito');

    }

    
}
