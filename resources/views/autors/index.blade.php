@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="card">
            <div class="card-header">
                    Autores Resgistrados 
                    @can('autors.create')
                        <a href="{{ route('autors.create') }}" class="btn btn-sm btn-primary pull-right">
                            Registrar un nuevo autor.
                        </a>
                    @endcan
                </div>

            <div class="card-body">
                    <table class="table table-striped table-hover">
                            <thead>
                                    <tr>
                                            <th width="10px" >ID</th>
                                            <th>Nombre del Autor.</th>
                                            <th colspan="3">&nbsp;</th>
                                        </tr>
                                
                            </thead>
                            <tbody>
                                
                                @foreach ($autor as $aut)
                                <tr>
                                    <td>{{ $aut->id }}</td>
                                    <td>{{ $aut->nombres }}</td>
                                    <td>{{ $aut->apellidos }}</td>
                                
                                    <td>
                                        @can('autors.edit')
                                        <a href="{{ route('autors.edit', $aut->id) }}"
                                                class="btn btn-sm btn-outline-info" role="button">
                                            Editar detalles</a>
                                        @endcan
                                    </td>
    
                                <td>
                                        @can('autors.destroy') 
                                        {!! Form::open(['route'=> ['autors.destroy', $aut->id],
                                        'method'=>'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger"> Eliminar</button>
                                        {!! Form::close() !!}
                                        
                                        @endcan
                                </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                        {{ $autor->render() }}
                    </div>
                
            </div>
    </div>

</div>

@endsection