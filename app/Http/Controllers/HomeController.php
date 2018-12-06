<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            return view('stats.users');
        }
        else return redirect('/recursos');
    }
    public function upload(){
        return view('upload');
    }
    public function uploadPost(Request $request){
        $request->validate([
            'file' => 'required|file|max:46000|mimes:jpeg,bmp,png',
        ]);
        $destinationPath = 'public/uploads/';
        $storagePath = Storage::disk('local')->put($destinationPath, $request->file);
        $storageName = basename($storagePath);
        $size = Storage::size($storagePath)/1000000;
        dd($size);
        return back()
            ->with('success','Archivo subido con exito');

    }

    
}
