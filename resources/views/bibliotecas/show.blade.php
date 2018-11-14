@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="card">
            
                <div class="card-header">
                   Informacion de la biblioteca.
                </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                       <tbody>
                           <p><strong> Nombre de la Biblioteca:</strong> {{ $biblioteca->nombreBiblioteca }}</p>
                           <p><strong> Ubicacion:</strong> {{ $biblioteca->direccion }}</p>
                           <p><strong> Telefono:</strong> {{ $biblioteca->telefono }}</p>
                           <p><strong> Nombre del encargado:</strong> {{ $biblioteca->nombreEncargado }}</p>
                          
                        </tbody>
                    </table>
                
                </div>
                <div class="card-footer">
                        <a href="{{ route('bibliotecas.index') }}" class="btn btn-sm btn-success" > Volver</a>
                </div>
            

        </div>

    </div>
@endsection