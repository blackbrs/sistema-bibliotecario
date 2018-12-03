@extends('layouts.admin')
@section('header')

@endsection
@section('content')
<div class="container">
<div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Datos generales
              </button>
            </h5>
          </div>
      
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                    <div class="container-fluid">
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
                            </div>
                              <div class="col-sm">
                                  <div class="row">
                                      <div class="col-sm">
                                          @if(!empty($recurso->thumb))
                                          <img src="/img/nothumb.gif" class="img-fluid" alt="">
                                          @else
                                          <img src="/img/nothumb.gif" class="img-fluid" alt="">
                                          @endif
                                      </div>
                                    </div>
                              </div>
                            </div>
                          </div>
            </div>
          </div>
        </div>
        @if($recurso->versionAlternativa)
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Alternativa digital
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
             
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
@endsection