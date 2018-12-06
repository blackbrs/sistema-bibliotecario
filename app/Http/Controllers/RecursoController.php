<?php

namespace App\Http\Controllers;

use App\Recurso;
use App\Fisico;
use App\Digital;
use App\prestamo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DateTime;
use DB;
class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bib= Auth::user()->biblioteca->nombreBiblioteca;
        $res = Recurso::where('biblioteca_id',Auth::user()->biblioteca->id)->paginate(10);
        return view('recursos.index',compact('bib','res'));
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

    // FUNCION QUE HACE EL PRESTAMO !!!!
    public function prestar(Recurso $recurso, User $user)
    {
        $cuenta = DB::table('prestamos')->where('user_id',$user->id)->where('prestamoActivo',TRUE)->count();
        $f=$recurso->getRes($recurso->principal)->id;
       // dd($cuenta2);
        if($recurso->getRes($recurso->principal)->fisico->unidadesDisponibles <= 0){
            return redirect()->route('recursos.index')->with('fail','NO HAY COPIAS DISPONIBLES.');
        }
        if($cuenta < 3){
            $pres = new prestamo(); 
            $pres->user_id = $user->id;
            $pres->biblioteca_id = $recurso->biblioteca_id;
            $pres->recurso_id = $recurso->id;
            $pres->prestamoActivo = TRUE;
            $pres->diasPrestado=1;
            $f=$recurso->getRes($recurso->principal)->id;
            $pres->save();
            DB::table('fisicos')->where('linkable_id',$f)->decrement('unidadesDisponibles', 1 );
            return back()->with('info','Prestamo realizado con exito');

        }
        return redirect()->route('recursos.index')->with('fail','USTED NO PUEDE REALIZAR EL PRESTAMO YA POSEE TRES SIN ENTREGAR REGISTRADOS EN EL SISTEMA.');
    }

    public function devolver($recurso, $prestamoid, $userid){
        $prestamo = prestamo::where('user_id',$userid)->where('id',$prestamoid)->first();
        $prestamo->prestamoActivo = FALSE;
        DB::table('fisicos')->where('linkable_id',$recurso)->increment('unidadesDisponibles', 1 );

        $dia_prestamo = new DateTime($prestamo->created_at);
        $hoy = new DateTime();
        $interval = $hoy->diff($dia_prestamo);
        $dias = $interval->format('%a');
        if($dias==0){$dias=1;}
        $prestamo->diasPrestado = $dias;
        $prestamo->save();
        return redirect()->back()->with('info','Gracias por devolver el recurso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recurso  $recursos
     * @return \Illuminate\Http\Response
     */
    public function show(Recurso $recurso)
    {
        $principal=$recurso->getRes($recurso->principal);
        $formatoFis = array('Libro','Tesis','Plano','Mapa');
        if($recurso->versionAlt){
            $formatoAudioAlt=array("mp3","wav","ogg","wma","mpga");
            return view('recursos.show.base', compact('recurso','principal','formatoAudioAlt','formatoFis'));
        }
        return view('recursos.show.base', compact('recurso','principal','formatoFis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recurso  $recursos
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurso $recurso)
    {
        $rselect='';
        $array_fis = array('DVD','CD','Libro','Tesis','Plano','Mapa');
        if($recurso->principal){
            if(in_array($recurso->principal,$array_fis)){
                $rselect='Fisico';
            }else{
                $rselect='Digital';
            }
        }
        return redirect('/recurso/create/p1')->with(compact($recurso,'recurso'));
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
        if(is_object($f)){
        $f->delete();
        }
        if(is_object($d)){
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
    private function validateAlternativaDigital($resclass, $pr, Request $request, Digital $alt){
        switch ($pr) {
            case 'Libro':
             $request->validate([
                'file' => 'required|file|mimes:pdf,mp4,avi,mov,wmv,webm,mp3,wav,ogg,wma,mpga',
            ]);
            break;
            case 'Tesis':
            $request->validate([
                'file' => 'required|file|mimes:pdf,',
            ]);
            break;
            case 'Plano':
            $request->validate([
                'file' => 'required|file|mimes:pdf,',
            ]);
            break;
            case 'Hemeroteca':
             $request->validate([
                'file' => 'required|file|mimes:pdf,',
            ]);
            break;
            case 'CD':
             $request->validate([
                'file' => 'required|file|mimes:mp3,wav,ogg,wma,mpga',
            ]);
            break;
            case 'DVD':
             $request->validate([
                'file' => 'required|file|mimes:mp4,avi,mov,wmv,webm',
            ]);
            break;
            case 'Mapa':
            $request->validate([
               'file' => 'required|file|mimes:pdf',
           ]);
            default:
                break;
        }
        $formato = $extension = $request->file('file')->extension();
        $storagePath = Storage::putFile("public",$request->file('file'));
        $path = basename($storagePath);
        $peso = Storage::size($storagePath)/1049000;
        $alt->formato = $formato;
        $alt->path = $path;
        $alt->peso = $peso;
        $resclass->save();
        $resclass->digital()->save($alt);
        return $alt;
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
                'duracion' => 'required|numeric',
                'nPistas' => 'required|numeric'
                ]);  
            case 'DVD':
            return $request->validate([
                'duracion' => 'required|numeric'
                ]);
            case 'Plano':
            return $request->validate([
                'dimension' => 'required',
                'fechaCreacion' => 'required'
                ]);  
            case 'Mapa':
            return $request->validate([
                'region' => 'required',
                'fechaCreacion' => 'required'
                ]); 
            case 'Hemeroteca':
            return $request->validate([
                'fechaCreacion' => 'required',
                'nombreColeccion' => 'required',
            ]);
            case 'Video':
            return $request->validate([
                'file' => 'required|file|mimes:mp4,avi,mov,wmv,webm',
            ]);
            case 'Audio':
                return $request->validate([
                'file' => 'required|file|mimes:mp3,wav,ogg,wma,mpga',
            ]);
            default:
                break;
        }
    }
    public function fillDigitalRes($resclass,$pr,Digital $digital,Request $request){
        switch ($pr) {
            case 'Video':
            $getID3 = new \getID3;
            $file=$request->file('file');
            $fileInfo = $getID3->analyze($file);
            $resclass->duracion=$fileInfo["playtime_string"];
            $resclass->bitrate= strval(round($fileInfo["bitrate"]/1000));
            $resclass->resolucion = strval($fileInfo["video"]["resolution_x"])."x".strval($fileInfo["video"]["resolution_y"]);
            $resclass->frames = $fileInfo["video"]["frame_rate"];
            $storagePath = Storage::putFile("public",$file);
            $path= basename($storagePath);
            $digital->formato = $fileInfo["fileformat"];
            $digital->peso = round($fileInfo["filesize"]/1049000);
            $digital->path = $path;
            $resclass->save();
            $resclass->digital()->save($digital);
                break;
            case 'Audio':
            $getID3 = new \getID3;
            $file=$request->file('file');
            $fileInfo = $getID3->analyze($file);
            $resclass->duracion=$fileInfo["playtime_string"];
            $resclass->bitrate= strval(round($fileInfo["bitrate"]/1000));
            $storagePath = Storage::putFile("public",$file);
            $path= basename($storagePath);
            $digital->formato = $fileInfo["fileformat"];
            $digital->peso = round($fileInfo["filesize"]/1049000);
            $digital->path = $path;
            $resclass->save();
            $resclass->digital()->save($digital);
                break;
            default:
            $formato = $extension = $request->file('file')->extension();
            $storagePath = Storage::putFile("public",$request->file('file'));
            $path = basename($storagePath);
            $peso = Storage::size($storagePath)/1049000;
            $digital->formato = $formato;
            $digital->path = $path;
            $digital->peso = $peso;
            $resclass->save();
            $resclass->digital()->save($digital);
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
            if(empty($request->file('thumb'))){}
                else{
                    $validateThumb = $request->validate([
                        'thumb' => 'file|max: 40000|mimes:jpeg,bmp,png,gif,jpg',
                    ]);
                    $storagePath = Storage::putFile("public",$request->file('thumb'));
                    $thumb= basename($storagePath);
                    $recurso->thumb = $thumb;
                }
            $recurso->biblioteca_id = Auth::user()->biblioteca_id;

            if($request->get('versionAlt')){$recurso->versionAlt = true;}
            else{$recurso->versionAlt = false;}
            $request->session()->put('recurso', $recurso);
            $request->session()->put('rselect', $rselect);
        }
        
        
        else{
            $recurso = $request->session()->get('recurso');
            $recurso->fill($validatedData);
            $recurso->save();
            if(empty($request->file('thumb'))){}
                else{
                    $validateThumb = $request->validate([
                        'thumb' => 'file|max:46000|mimes:jpeg,bmp,png,gif,jpg',
                    ]);
                    Storage::disk('local')->delete($recurso->thumb);
                    $storagePath = Storage::putFile("public",$request->file('thumb'));
                    $thumb= basename($storagePath);
                    $recurso->thumb = $thumb;
                }

            $recurso->biblioteca_id = Auth::user()->biblioteca_id;

            if($request->get('versionAlt')){$recurso->versionAlt = true;}else{$recurso->versionAlt = false;}
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
        $recurso->save();
        $pr = $recurso->principal;
        $resclass = $request->session()->get('resclass');
        $rselect = $request->session()->get('rselect');
        $alt= $request->session()->get('alt');

        if(empty($resclass)){
            $model = 'App\\'.$pr;
            $resclass = new $model;

            if($rselect=='fisico'){
            $resclass->fill(self::validatePrincipal($request, $pr));
            $recurso->save();
            $resclass->recurso_id=$recurso->id;
            $resclass->save();
            }else if($rselect=='digital'){
                $recurso->save();
                if($pr=="Tesis" || $pr=='Libro'|| $pr=='Plano'|| $pr=='Mapa'){$resclass->fill(self::validatePrincipal($request, $pr));}
                $resclass->recurso_id=$recurso->id;
               self::validatePrincipal($request, $pr);
            }
        }
        else{
            if($rselect=='fisico'){
            $resclass->fill(self::validatePrincipal($request, $pr));
            $recurso->save();
            $resclass->recurso_id=$recurso->id;
            $resclass->save();
            }else if($rselect=='digital'){
                $recurso->save();
                if($pr=="Tesis" || $pr=='Libro'|| $pr=='Plano'|| $pr=='Mapa'){$resclass->fill(self::validatePrincipal($request, $pr));}
                $resclass->recurso_id=$recurso->id;
                self::validatePrincipal($request, $pr);
            }
        }

        if($rselect=='fisico'){
            if(empty($request->session()->get('fisico'))){
                $fisico = new Fisico();
                $fisico->fill(self::validateFisico($request));
                $resclass->fisico()->save($fisico);
                $request->session()->put('fisico', $fisico);
                $request->session()->put('resclass', $resclass);
                
            }
            else{
                $fisico = $request->session()->get('fisico');
                $fisico->fill(self::validateFisico($request));
                $resclass->fisico()->save($fisico);
                $request->session()->put('fisico', $fisico);
                $request->session()->put('resclass', $resclass);
            }

            if($recurso->versionAlt){
            if(empty($alt)){
                $alt = new Digital();
                $alt= self::validateAlternativaDigital($resclass, $pr, $request, $alt);
                $request->session()->put('alt', $alt);
            }
            else{
                $alt = self::validateAlternativaDigital($resclass, $pr, $request, $alt);
                $request->session()->put('alt', $alt);
            }
        }
         

        }else if($rselect == 'digital'){
            if(empty($request->session()->get('digital'))){
                $digital = new Digital();
                self::fillDigitalRes($resclass,$pr,$digital,$request);
                $request->session()->put('digital', $digital);
            }else{
                $digital = $request->session()->get('digital');
                Storage::disk('local')->delete($digital->path);
                self::fillDigitalRes($resclass,$pr,$digital,$request);
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
        $recurso = $request->session()->forget('recurso');
        $request->session()->forget('recurso');
        $rselect = $request->session()->forget('rselect');
        $request->session()->forget('alt');
        $request->session()->forget('pr');
        $request->session()->forget('fisico');
        $request->session()->forget('digital');
        $request->session()->forget('resclass');
        if($recurso){$recurso->delete();}
        return redirect()->route('recursos.index');
    }
}
