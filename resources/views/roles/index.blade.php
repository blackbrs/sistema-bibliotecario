@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Roles del sistema bibliotecario
                    @can('roles.create')
                    <a href="{{ route('roles.create') }}" 
                    class="btn btn-sm btn-primary pull-right">
                        Crear Rol
                    </a>
                        
                    @endcan
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px" >ID</th>
                                <th>Nombre del rol</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $rol)
                            <tr>
                                <td>{{ $rol->id }}</td>
                                <td>{{ $rol->name }}</td>
                                <td>
                                @can('roles.show')
                                <a href="{{ route('roles.show', $rol->id) }}"
                                    class="btn btn-sm btn-default">
                                Ver Detalles</a>
                                @endcan
                                </td>

                                <td>
                                        @can('roles.edit')
                                        <a href="{{ route('roles.edit', $rol->id) }}"
                                            class="btn btn-sm btn-default">
                                        Editar Usuario</a>
                                        @endcan
                                 </td> 

                                 <td>
                                        @can('roles.destroy') 
                                       {!! Form::open(['route'=> ['roles.destroy', $rol->id],
                                       'method'=>'DELETE']) !!}
                                       <button class="btn btn-sm btn-danger"> Eliminar</button>
                                       {!! Form::close() !!}
                                       
                                        @endcan
                                 </td> 

                                
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection