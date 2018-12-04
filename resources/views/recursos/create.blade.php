@extends('layouts.admin')
@section('header')
@include('recursos.partials.script')  
@endsection
@section('content')
@php( $autor = \App\Autor::all()) 
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class=" panel panel-default">
                         <div class="card-header">
                        <div class="panel-heading"> Registrar recurso - paso 1 </div>
                         </div>
                         <div class="card-body">
                        <div class="panel-body">
                                <form id="RC" action="/recurso/create/p1" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="titulo">Nombre del recurso:</label>
                                    <input type="text" value="{{{ $recurso->titulo or '' }}}" class="form-control" id="RC_titulo"  name="titulo" required>
                                    
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea type="text"  class="form-control" id="RC_descripcion" name="descripcion" style="resize: none;" required>{{{ $recurso->descripcion or '' }}}</textarea>
                                        
                                    </div>
                                    <div class="form-group">
                                        {!! Form::label('año', 'año de publicación') !!}
                                        <input type="number" class="form-control" name="año" id="RC_año" min="1900" max="2018" value="{{{ $recurso->año or '' }}}" required>
                                             
                                    </div>
                                    <div class="form-group">
                                            {!! Form::label('autor', 'Autor/es') !!}
                                            <select name="autor_id" id= "autor_id" class="form-control"required >        
                                                    <option value="">Autor</option>
                                                    @foreach ($autor as $aut)
                                                    <option value="{{ $aut->id }}">{{ $aut->nombres}} {{ $aut->apellidos}}</option>  
                                                    @endforeach
                                                </select>    
                                              
                                     </div>
                                    <div class="form-group">
                                            {!! Form::label('genero', 'Genero') !!}
                                            <select name="genero" id= "genero" class="form-control"required >        
                                                <option  disabled selected>Selecciona una opcion</option>
                                                <option >Narrativo</option>
                                                <option >Didactico</option>
                                                <option >Otro</option>
                                            </select>  

                                    </div>
                                    <div class="form-group">
                                            {!! Form::label('categoria', 'Categoria') !!}
                                            <select name="categoria" id= "categoria" class="form-control"required >        
                                                <option value="" disabled selected>Selecciona una opcion</option>
                                                <option >Literatura</option>
                                                <option >Arte</option>
                                                <option >Arquitectura</option>
                                                <option >Biografia</option>
                                                <option >Negocios</option>
                                                <option >Economia</option>
                                                <option >Matematicas</option>
                                                <option >Ciencias politicas</option>
                                                <option >Fisica</option>
                                                <option >Filosofia</option>
                                                <option >Psicologia</option>
                                                <option >Ciencias sociales</option>
                                                <option >Deportes</option>
                                                <option >Salud</option>
                                                <option >Lengua</option>
                                                <option >Leyes</option>
                                                <option >Medicina</option>
                                                <option >Musica</option>
                                                <option >Tecnologia</option>
                                                <option >Ingenieria</option>
                                                <option >Otro</option>
                                                <option >Entretenimiento</option>
                                            </select>  
                                             
                                    </div>
                                    <div class="form-group">
                                            {!! Form::label('tipoRecurso', 'Tipo') !!}
                                            <div class="form-group">
                                            <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="recursoRB" id="fisicoRB" value="fisico" {{ ($rselect=="fisico")? "checked" : "" }} required>
                                                    <label class="form-check-label" for="fisicoRB">Fisico</label>
                                                  </div>
                                            <div class="form-check-inline">
                                                    <input class="form-check-input" type="radio" name="recursoRB" id="digitalRB" value="digital" {{ ($rselect=="digital")? "checked" : "" }}>
                                                    <label class="form-check-label" for="digitalRB">Digital</label>
                                                  </div>
                                            </div>
                                                  <select name="principal" id= "principal" class="form-control" placeholder="Seleccionar recurso" required>
                                                        <option value="" disabled selected>Selecciona una opcion</option>
                                                        <option class="opcFis" {{{ (isset($recurso->principal) && $recurso->principal == 'Libro') ? "selected=\"selected\"" : "" }}}>Libro</option>
                                                        <option class="opcFis" {{{ (isset($recurso->principal) && $recurso->principal == 'CD') ? "selected=\"selected\"" : "" }}}>CD</option>
                                                        <option class="opcFis" {{{ (isset($recurso->principal) && $recurso->principal == 'DVD') ? "selected=\"selected\"" : "" }}}>DVD</option>
                                                        <option class="opcFis" {{{ (isset($recurso->principal) && $recurso->principal == 'Mapa') ? "selected=\"selected\"" : "" }}}>Mapa</option>
                                                        <option class="opcDig" {{{ (isset($recurso->principal) && $recurso->principal == 'Video') ? "selected=\"selected\"" : "" }}}>Video</option>
                                                        <option class="opcDig" {{{ (isset($recurso->principal) && $recurso->principal == 'Audio') ? "selected=\"selected\"" : "" }}}>Audio</option>
                                                        <option class="opcDig" {{{ (isset($recurso->principal) && $recurso->principal == 'Plano') ? "selected=\"selected\"" : "" }}}>Plano</option>
                                                        <option {{{ (isset($recurso->principal) && $recurso->principal == 'Tesis') ? "selected=\"selected\"" : "" }}}>Tesis</option>
                                                    </select>      
                                    </div>
                                    <div class="form-group">
                                            <input type="checkbox" id="versionAlt" name="versionAlt" style="display:none" value="1" {{{ (isset($recurso->versionAlt) && $recurso->versionAlt == '1') ? "checked" : "" }}}>
                                        <label class="form-check-label" id="lb1" for="versionAlt"> </label>
                                    </div>
                                    <div class="form-group">
                                    <label for="thumb">Miniatura:</label>
                                    {{ csrf_field() }}
                                    <input type="file" class="form-control-file" name="thumb" id="RC_thumb" aria-describedby="fileHelp">
                                    <small id="fileHelp" class="form-text text-muted">El archivo debe ser menor de 2MB</small>
                                </div>
                                    </div>
                                    <button type="buttom" id="btnf1" class="btn btn-info">Continuar</button> 
                            </form>
                              
                        </div>
                    </div>
                    <div class="card-footer">
                            <a href="{{ route('recursos.cancelar.p1') }}" class="btn btn-sm btn-danger" > Cancelar y volver</a>
                    </div>
                    </div>
                </div>
        </div>

    </div>

</div>
    
@endsection