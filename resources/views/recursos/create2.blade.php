@extends('layouts.admin')
@section('header')
@include('recursos.partials.script2')  
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class=" panel panel-default">
                         <div class="card-header">
                        <div class="panel-heading"> Registrar recurso - paso 2 </div>
                         </div>
                         <div class="card-body">
                        <div class="panel-body">
                                <form id="RC2" action="/recurso/create/p2" method="post">
                                    {{ csrf_field() }}
                                    @if ($rselect == 'fisico')
                                        @include('recursos.partials.fisico')
                                    @elseif ($rselect == 'digital')
                                        @include('recursos.partials.digital')
                                    @else
                                        <!--no hacer nada / hay errores en el form anterior - permanecer ahi-->
                                    @endif
                                    <button type="buttom" id="btnf2" class="btn btn-primary">Finalizar</button>  
                                </form>
                              
                            </div>
                        </div>
                        <div class="card-footer">
                                <a href="{{ route('recursos.cancelar.p2') }}" class="btn btn-sm btn-danger" > Cancelar y volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection