@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informacion de los roles 
                </div>
                <div class="panel-body">
                        <p><strong>  Nombre: </strong>{{ $role->name }}</p>
                        <p><strong>  Slug: </strong>{{ $role->slug }}</p>
                        <p><strong>  Descripcion: </strong>{{ $role->description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection