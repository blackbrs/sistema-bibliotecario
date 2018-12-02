@extends('layouts.admin')

@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="row">
       <div class="col-12">
        <div class="card">
            <div class="panel panel-default">
                    <div class="card-header">
                            <table class="table table-striped table-hover">
                                
                            <div class="panel-heading">
                                    <th>  Recursos de {{$bib->nombreBiblioteca}}  </th>
                                @can('users.create')
                                <th><a href="{{ route('recurso.create') }}" class="btn btn-sm btn-primary">
                                    Agregar un nuevo recurso 
                                </a></th> 
                                </div>
                                @endcan
                            </table>

                        </div>

                        <a href="{{ route('recursos.create') }}" class="btn btn-sm btn-primary pull-right">
                                Registrar un nuevo recurso.
                            </a>
           <div class="card-body">          
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px" >ID</th>
                                <th>Titulo</th>
                                <th>Autor</th>
                                <th>Genero</th>
                                <th>Categoria</th>
                                <th>Tipo</th>
                                <th>Año</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bib->recursos as $recurso)
                            <tr>
                                <td>{{ $recurso->id }}</td>
                                <td>{{ $recurso->titulo }}</td>
                                <td>{{ $recurso->autor->nombres}} {{ $recurso->autor->apellidos}}</td>
                                <td>{{ $recurso->genero }}</td>
                                <td>{{ $recurso->categoria }}</td>
                                <td>{{ $recurso->principal }}</td>
                                <td>{{ $recurso->año }}</td>
                                <td>
                                @can('users.show')
                                
                                <a href="{{ route('recurso.show', $recurso->id) }}"
                                    class="btn btn-sm btn-outline-info" role="button">
                                Ver Detalles</a>
                                @endcan
                                </td>

                                <td>
                                        @can('users.edit')
                                        <a href="{{ route('recurso.edit', $recurso->id) }}"
                                            class="btn btn-sm btn-outline-info" role="button">
                                        Editar</a>
                                        @endcan
                                 </td> 

                                 <td>
                                        @can('users.destroy') 
                                       {!! Form::open(['route'=> ['recurso.destroy', $recurso->id],
                                       'method'=>'DELETE']) !!}
                                       <button class="btn btn-sm btn-danger"> Eliminar</button>
                                       {!! Form::close() !!}
                                       
                                        @endcan
                                 </td> 

                                
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
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