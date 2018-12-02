<?php

namespace App\Http\Controllers;

use App\Recurso;
use App\Fisico;
use App\Digital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bib= Auth::user()->biblioteca;
        return view('recursos.index',compact('bib'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  \App\Recurso  $recursos
     * @return \Illuminate\Http\Response
     */
    public function show(Recurso $recurso)
    {
        $pr=$recurso->principal;
        return view('recursos.show', compact('pr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recurso  $recursos
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurso $recurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recurso  $recursos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recurso $recurso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recursos  $recursos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recurso $recurso)
    {
        $f=$recurso->getRes($recurso->principal)->fisico;
        $d=$recurso->getRes($recurso->principal)->digital;
        if($f){
        $f->delete();
        }
        if($d){
        $d->delete();
        }
        $recurso->delete();
        return back()->with('info','El recurso ha sido eliminado con exito');
    }


    private function validateFisico(Request $request){
        return $request->validate([
                'copias' => 'required|numeric',
                'unidadesDisponibles' => 'required|numeric',
                'prestamosRealizados' => 'required|numeric',
            ]);
    }
    private function validateDigital(Request $request, String $pr){
        switch ($pr) {
            case 'Video':
            return $request->validate([
                'file' => 'required|file|max:46000|mimes:mp4,avi,mov,wmv,webm',
            ]);
            case 'Tesis':
                return $request->validate([
                'file' => 'required|file|max:46000|mimes:pdf',
            ]);
            case 'Audio':
                return $request->validate([
                'file' => 'required|file|max:46000|mimes:mp3,wav,ogg,wma',
            ]);
            case 'Planos':
                return $request->validate([
                'file' => 'required|file|max:46000|mimes:pdf',
            ]);
            case 'Hemeroteca':
                return $request->validate([
                'file' => 'required|file|max:46000|mimes:pdf',
            ]);
            default:
                break;
    }
}
    private function validateDigitalAlt(Request $request, String $pr){
        switch ($pr) {
            case 'Libro':
            return $request->validate([
                
            ]);
            case 'Tesis':
            return $request->validate([
                
                ]);  
            case 'CD':
            return $request->validate([
                
                ]);  
            case 'DVD':
            return $request->validate([
                
                ]);  
            case 'Mapa':
            return $request->validate([
                
                ]); 
            case 'Hemeroteca':
            return $request->validate([
                
                ]); 
            default:
                break;
        }
    }
    public function validatePrincipal(Request $request, String $pr){
        switch ($pr) {
            case 'Libro':
            return $request->validate([
                'editorial_id' => 'required',
                'volumen' => 'required',
                'ISBN' => 'required',
                'paginas' => 'required',
            ]);
            case 'Tesis':
            return $request->validate([
                'carrera' => 'required',
                'paginas' => 'required|numeric'
                ]);  
            case 'CD':
            return $request->validate([
                '' => '',
                '' => ''
                ]);  
            case 'DVD':
            return $request->validate([
                '' => '',
                ]);  
            case 'Mapa':
            return $request->validate([
                '' => '',
                ]); 
            case 'Hemeroteca':
            return $request->validate([
                '' => '',
                '' => '',
                '' => ''
            ]);
            case 'Video':
            return $request->validate([
                'file' => 'required|file|max:46000|mimes:mp4,avi,mov,wmv,webm',
            ]);
            case 'Tesis':
                return $request->validate([
                'file' => 'required|file|max:46000|mimes:pdf',
            ]);
            case 'Audio':
                return $request->validate([
                'file' => 'required|file|max:46000|mimes:mp3,wav,ogg,wma',
            ]);
            case 'Planos':
                 return $request->validate([
                'file' => 'required|file|max:46000|mimes:pdf',
             ]);
             case 'Hemeroteca':
                return $request->validate([
                'file' => 'required|file|max:46000|mimes:pdf',
            ]); 
            default:
                break;
        }
    }
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
            'autor_id' => 'required',
            'categoria' => 'required',
            'genero' => 'required',
            'descripcion' => 'required|string|max:255',
            "principal" => 'required',
        ]);
        if(empty($request->session()->get('recurso'))){
            
            $recurso = new Recurso();
            $rselect = $request->get('recursoRB');
            $recurso->fill($validatedData);
            $recurso->biblioteca_id = Auth::user()->biblioteca_id;
            if($request->get('versionAlt')){$recurso->versionAlt = true;}else{$recurso->versionAlt = false;}
            $recurso->save();
            $request->session()->put('recurso', $recurso);
            $request->session()->put('rselect', $rselect);
        }else{
            $recurso = $request->session()->get('recurso');
            $recurso->fill($validatedData);
            $recurso->biblioteca_id = Auth::user()->biblioteca_id;
            if($request->get('versionAlt')){$recurso->versionAlt = true;}else{$recurso->versionAlt = false;}
            $recurso->save();
            $rselect = $request->get('recursoRB');
            $request->session()->put('recurso', $recurso);
            $request->session()->put('rselect', $rselect);

        }
        return redirect('/recurso/create/p2');
    }
    public function createP2(Request $request)
    {
        $recurso = $request->session()->get('recurso');
        $pr = $recurso->principal;
        $resclass = $request->session()->get('resclass');
        $rselect = $request->session()->get('rselect');
       if($rselect == "fisico"){
           $fisico = $request->session()->get('fisico');
           if($recurso->versionAlt){
               $alt= $request->session()->get('alt');
           }
           return view('recursos.create2', compact('recurso', 'alt','fisico', 'pr','rselect', 'resclass'));
        }
       elseif($rselect == "digital"){
           $digital = $request->session()->get('digital');
           if($recurso->versionAlt){
            $alt= $request->session()->get('alt');
            }
            return view('recursos.create2', compact('recurso', 'alt','digital', 'pr','rselect', 'resclass'));
        }
        
    }
    public function postCreateP2(Request $request)
    {
        $recurso = $request->session()->get('recurso');
        $pr = $recurso->principal;
        $resclass = $request->session()->get('resclass');
        $rselect = $request->session()->get('rselect');
        $alt= $request->session()->get('alt');

        if(empty($resclass)){
            $model = 'App\\'.$pr;
            $resclass = new $model;
            $resclass->fill(self::validatePrincipal($request, $pr));
            $resclass->recurso_id=$recurso->id;
            $resclass->save();
        }
        else{
            $resclass->fill(self::validatePrincipal($request, $pr));
            $resclass->recurso_id=$recurso->id;
            $resclass->save();
        }

        if($rselect=='fisico'){
            if(empty($request->session()->get('fisico'))){
                $fisico = new Fisico();
                $fisico->fill(self::validateFisico($request));
                $resclass->fisico()->save($fisico);
                $request->session()->put('fisico', $fisico);
                $request->session()->put('resclass', $resclass);
            }else{
                $fisico = $request->session()->get('fisico');
                $fisico->fill(self::validateFisico($request));
                $resclass->fisico()->save($fisico);
                $request->session()->put('fisico', $fisico);
                $request->session()->put('resclass', $resclass);
            }
            if($recurso->versionAlt){
                $validateAltD = $request->validate([
                    'file' => 'required|file|max:46000',
                ]);
            if(empty($alt)){
                $alt = new Digital();
               // $alt->fill($validateAltD);
                $request->session()->put('alt', $alt);
            }else{
                //$alt->fill($validateAltD);
                $request->session()->put('alt', $alt);
            }
        }
            
        }else if($rselect == 'digital'){
            if(empty($request->session()->get('digital'))){
                $digital = new Digital();
                $digital->save($request->session()->get('resclass'));
                $request->session()->put('digital', $digital);
            }else{
                $digital = $request->session()->get('digital');
                $digital->save($request->session()->get('resclass'));
                $request->session()->put('digital', $digital);
            }
            /*
            if($recurso->versionAlt){
            if(empty($alt)){
                $alt = new Fisico();
                $alt->fill($validateAltF);
                $request->session()->put('alt', $alt);
            }
            else{
                $alt->fill($validateAltF);
                $request->session()->put('alt', $alt);
            }
            
        }
          */  
        }else{
            //
        }
        $request->session()->forget('recurso');
        $request->session()->forget('resclass');
        $request->session()->forget('rselect');
        $request->session()->forget('alt');
        $request->session()->forget('pr');
        $request->session()->forget('fisico');
        $request->session()->forget('digital');

        return redirect()->route('recursos.index')
        ->with('info','Recurso Guardado con exito');   
    }
    public function cancelarP1(Request $request){
        $recurso = $request->session()->forget('recurso');
        $rselect = $request->session()->forget('rselect');

        return redirect()->route('recursos.index');
    }
    public function cancelarP2(Request $request){
        $request->session()->forget('alt');
        $request->session()->forget('pr');
        $request->session()->forget('fisico');
        $request->session()->forget('digital');
        $request->session()->forget('resclass');
        
        return redirect()->route('recursos.index');
    }
}
