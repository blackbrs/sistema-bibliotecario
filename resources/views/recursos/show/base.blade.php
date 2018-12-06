@extends('layouts.admin')
@section('header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.css" defer/>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.2/dist/jquery.fancybox.min.js" defer></script>
<script defer type="text/javascript">
  $(function () {
      $('#res').fancybox({
        fitToView	: true,
		    autoSize	: true,,
		    type : 'iframe',
      });
  });
</script>
@endsection
@section('content')
<div class="container">
<div id="detalle">
        <div class="card">
          <div class="card-header" id="headingOne">
              <button class="btn btn-lg btn-link navbar-left" aria-expanded="true"">
                Datos generales
              </button>
                @if($principal->fisico)
                @can('recurso.prestar')
                <a href="{{ route('recurso.prestar',[$recurso->id , Auth::user()->id ]) }}" style="float: right;" class="btn btn-lg btn-success navbar-right" role="button">
                   Prestar recurso</a>
                @endcan
                @endif
          </div>
      
          <div aria-labelledby="headingOne" data-parent="#detalle">
            <div class="card-body">
                    <div class="container-fluid">
                        @if($Video=$principal->digital)
                        @if($recurso->principal=="Video")
                      <div class="row">
                          <video src="{{asset("storage/$Video->path")}}" preload="metadata" controls width="100%" height="100%"></video>
                      </div>
                      @endif @endif
                            <div class="row">
                              <div class="col-sm">
                                    <table class="table">
                                            <tbody>
                                                    <tr>
                                                    <th scope="row"> Titulo:</th>
                                                    <td>{{ $recurso->titulo }}</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">Descripción:</th>
                                                    <td>{{ $recurso->descripcion }}</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">Autor:</th>
                                                    <td>{{ $recurso->Autor->nombres}} {{ $recurso->Autor->apellidos}}</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">Año de publicación:</th>
                                                    <td>{{ $recurso->año}}</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">Genero:</th>
                                                    <td>{{ $recurso->genero}}</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">Categoria</th>
                                                    <td>{{ $recurso->categoria }}</td>
                                                    </tr>
                                                    <tr>
                                                    <th scope="row">Tipo</th>
                                                    <td>{{ $recurso->principal }}</td>
                                                    </tr>
                                                    @include('recursos.show.'.$recurso->principal)   
                                                </tbody>
                                            </table> 
                                          @if($Res=$principal->digital)
                                          @if($recurso->principal=="Audio")
                                              <figure>
                                                  <figcaption>Escuchar:</figcaption>
                                                  <audio
                                                      controls controlsList="nodownload"
                                                      src="{{asset("storage/$Res->path")}}">
                                                          Tu navegador no soporta el
                                                          elemento de<code>audio</code>.
                                                  </audio>
                                              </figure>
                                              @else
                                              @if($recurso->versionAlt==0)
                                              @if(in_array($recurso->principal,$formatoFis))
                                              <div>
                                                <a class="btn btn-info" data-fancybox href="{{asset("storage/$Res->path")}}">
                                                  Ver recurso
                                                  </a>
                                                </div>
                                                @endif
                                                @endif
                                              @endif
                                              @endif
                                               @if(($recurso->versionAlt!=0)&&$principal->digital)
                                               @if(in_array($principal->digital->formato,$formatoAudioAlt)==false)
                                                  <div>
                                                  <a class="btn btn-info" data-fancybox href="{{asset("storage/$Res->path")}}">
                                                    Version digital
                                                    </a>
                                                  </div>
                                               @else
                                               <div>
                                               <figure>
                                                  <figcaption>Preview en digital:</figcaption>
                                                  <audio
                                                      controls controlsList="nodownload"
                                                      src="{{asset("storage/$Res->path")}}">
                                                          Tu navegador no soporta el
                                                          elemento de<code>audio</code>.
                                                  </audio>
                                              </figure>
                                            </div>
                                                @endif
                                              @endif 
                                            </div>

                                  
                                    @if($recurso->principal!="Video")
                                    <div class="col-sm">
                                            @if($recurso->thumb)
                                            <img src="{{asset("storage/$recurso->thumb")}}" class="img" width="500" height="600">
                                            @else
                                            <img src="{{asset("storage/nothumb.gif")}}" class="img" width="500" height="600">
                                            @endif
                                          </div>
                                            @endif
                                  
                                </div>
                            
                            </div>
                          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection