@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="row">
         <div class="col-12">
          <div class="card">
            
              <div class="panel panel-default">
                      <div class="card-header">
                              <div class="panel-heading">
                                    Prestamos Realizados En La Biblioteca
                              </div>
                          </div>
  
  
             <div class="card-body">          
                      <table class="table table-striped table-hover">
                          <thead>
                              <tr>
                                  <th width="10px" >ID</th>
                                  <th>Titulo</th>
                                  <th>Descripcion</th>
                                  <th>year</th>
                                  <th>Biblioteca</th>
                                  <th>Usuario</th>
                                  <th>Dias prestado</th>
                                  <th>Estado Prestamo</th>
                                  <th colspan="6">&nbsp;</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($prest as $pre)
                              <tr>
                                  <td>{{ $pre->id}}</td>
                                  <td>{{ $pre->recurso->titulo }}</td>
                                  <td>{{ $pre->recurso->descripcion }}</td>
                                  <td>{{ $pre->recurso->año }}</td>
                                  <td>{{ $pre->biblioteca->nombreBiblioteca }}</td> 
                                  <td>{{ $pre->user->nombres}}</td>
                                  <td>{{ $pre->diasPrestado}}</td>
                                  @if ( $pre->prestamoActivo  ==TRUE)
                                  <td><p style="color:red;"> SIN DEVOLVER</p></td>
                                  <td>
                                        @can('users.edit')
                                        <a href="{{ route('recurso.devolver',[$pre->recurso->getRes($pre->recurso->principal)->id,$pre->id,$pre->user->id]) }}"
                                            class="btn btn-sm btn-info" role="button">
                                        Devolver Recurso</a>
                                        @endcan
                                 </td> 
                                  @else
                                  <td><p style="color:green;"> DEVUELTO</p> </td>
                                  <td>---------------------</td>
                                  @endif
                                 
                                  
                                  
                              </tr>
                                  
                              @endforeach
                          </tbody>
                      </table>
                      {{ $prest->render() }}
              </div>
          </div>
          <div class="card-footer">
                  <a href="{{ route('home') }}" class="btn btn-sm btn-success" >  volver</a>
              </div> 
      </div>
      
  
  
      </div>
  
  </div>
  </div>
  </div>



@endsection