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
            return view('stats');
        }
        else return view('home');
    }
    public function upload(){
        return view('upload');
    }
    public function uploadPost(Request $request){
        $request->validate([
            'file' => 'required|file|max:46000',
        ]);
        // Set the destination path
        $destinationPath = 'public/uploads/';
        // Store the file and it's destination path INCLUDING THE NEW FILENAME
        $storagePath = Storage::disk('local')->put($destinationPath, $request->file);
        // Extract the filename
        $storageName = basename($storagePath);
        dd($storageName);
        return back()
            ->with('success','Archivo subido con exito');

    }

    
}
