@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="card">
                     <div class="panel panel-default">
                          <div class="card-header">
                            <div class="panel-heading">
                                Informacion de los roles 
                            </div>
                        </div>
                        <div class="card-body">
                             <div class="panel-body">
                                    <p><strong>  Nombre: </strong>{{ $role->name }}</p>
                                    <p><strong>  Slug: </strong>{{ $role->slug }}</p>
                                    <p><strong>  Descripcion: </strong>{{ $role->description }}</p>
                             </div>
                         </div>
                         <div class="card-footer">
                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-danger" > volver</a>
                        </div>
                    
            </div>
    </div>
</div>
@endsection