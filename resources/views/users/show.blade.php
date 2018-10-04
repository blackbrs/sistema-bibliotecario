@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informacion del Usuario
                </div>
                <p><strong>  Nombres: </strong>{{ $user->nombres }}</p>
                <p><strong>  Apellidos: </strong>{{ $user->apellidos }}</p>
                <p><strong>  Fecha de Nacimiento: </strong>{{ $user->nacimiento }}</p>
                <p><strong>  Sexo: </strong>{{ $user->sexo }}</p>
                <p><strong>  Nombre del papa o mama: </strong>{{ $user->Npadres }}</p>
                <p><strong>  telefono: </strong>{{ $user->telefono }}</p>
                <p><strong>  correo electronico: </strong>{{ $user->email }}</p>
                <div class="panel-body">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection