@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            
                <div class="card-header">
                    Bibliotecas Registradas en el sistema
                    @can('bibliotecas.create')
                        <a href="{{ route('bibliotecas.create') }}" class="btn btn-sm btn-primary pull-right">
                            Crear Una Nueva Biblioteca.
                        </a>
                    @endcan
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                                <tr>
                                        <th width="10px" >ID</th>
                                        <th>Nombre de la biblioteca</th>
                                        <th colspan="3">&nbsp;</th>
                                    </tr>
                            
                        </thead>
                        <tbody>
                            
                            @foreach ($biblioteca as $biblio)
                            <tr>
                                <td>{{ $biblio->id }}</td>
                                <td>{{ $biblio->nombreBiblioteca }}</td>
                                <td>
                                    @can('bibliotecas.show')
                                    <a href="{{ route('bibliotecas.show', $biblio->id) }}"
                                            class="btn btn-sm btn-outline-info" role="button">
                                        Ver Detalles</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('bibliotecas.edit')
                                    <a href="{{ route('bibliotecas.edit', $biblio->id) }}"
                                            class="btn btn-sm btn-outline-info" role="button">
                                        Editar detalles</a>
                                    @endcan
                                </td>

                            <td>
                                    @can('bibliotecas.destroy') 
                                    {!! Form::open(['route'=> ['bibliotecas.destroy', $biblio->id],
                                    'method'=>'DELETE']) !!}
                                    <button class="btn btn-sm btn-danger"> Eliminar</button>
                                    {!! Form::close() !!}
                                    
                                    @endcan
                            </td>
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    {{ $biblioteca->render() }}
                </div>
            

        </div>

    </div>
@endsection