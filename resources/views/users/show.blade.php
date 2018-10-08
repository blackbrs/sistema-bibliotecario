@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="row">
                    <div class="card">
                            <div class="panel panel-default">
                                    <div class="card-header">
                                <div class="panel-heading">Informacion del Usuario</div>
                                    </div>
                                    <div class="card-body">
                                <p><strong>  Nombres: </strong>{{ $user->nombres }}</p>
                                <p><strong>  Apellidos: </strong>{{ $user->apellidos }}</p>
                                <p><strong>  Fecha de Nacimiento: </strong>{{ $user->nacimiento }}</p>
                                <p><strong>  Sexo: </strong>{{ $user->sexo }}</p>
                                <p><strong>  Municipio: </strong>{{ $user->municipio->nMunicipio}}</p>
                                <p><strong>  Nombre del papa o mama: </strong>{{ $user->Npadres }}</p>
                                <p><strong>  telefono: </strong>{{ $user->telefono }}</p>
                                <p><strong>  correo electronico: </strong>{{ $user->email }}</p>
                                <p><strong>  Biblioteca Inscrita: </strong>{{ $user->biblioteca->nombreBiblioteca }}</p>

                                    </div>
                                    <div class="card-footer">
                                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-success" > Volver</a>
                                    </div>
                            </div>
                        </div>         
            </div>       
    </div>
</div>
@endsection