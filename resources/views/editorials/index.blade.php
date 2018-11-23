@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="card">
            <div class="card-header">
                    Editoriales Resgistrados 
                    @can('editorials.create')
                        <a href="{{ route('editorials.create') }}" class="btn btn-sm btn-primary pull-right">
                            Registrar un nuevo editorial.
                        </a>
                    @endcan
                </div>

            <div class="card-body">
                    <table class="table table-striped table-hover">
                            <thead>
                                    <tr>
                                            <th width="10px" >ID</th>
                                            <th>Nombre del editorial.</th>
                                            <th colspan="3">&nbsp;</th>
                                        </tr>
                                
                            </thead>
                            <tbody>
                                
                                @foreach ($editorial as $edito)
                                <tr>
                                    <td>{{ $edito->id }}</td>
                                    <td>{{ $edito->nombre }}</td>
                                    
                                
                                    <td>
                                        @can('editorials.edit')
                                        <a href="{{ route('editorials.edit', $edito->id) }}"
                                                class="btn btn-sm btn-outline-info" role="button">
                                            Editar detalles</a>
                                        @endcan
                                    </td>
    
                                <td>
                                        @can('editorials.destroy') 
                                        {!! Form::open(['route'=> ['editorials.destroy', $edito->id],
                                        'method'=>'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger"> Eliminar</button>
                                        {!! Form::close() !!}
                                        
                                        @endcan
                                </td>
                                </tr>
                                    
                                @endforeach
                            </tbody>
                        </table>
                        {{ $editorial->render() }}
                    </div>
                
            </div>
    </div>

</div>

@endsection