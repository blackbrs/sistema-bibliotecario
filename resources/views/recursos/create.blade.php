@extends('layouts.admin')
@section('header')
@include('recursos.partials.script')  
@endsection
@section('content')
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
                                <form id="RC" action="/recurso/create/p1" method="post">
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
                                            <input type="text" value="{{{ $recurso->autor or '' }}}" class="form-control" id="RC_autor"  name="autor" required>
                                              
                                     </div>
                                    <div class="form-group">
                                            {!! Form::label('genero', 'Genero') !!}
                                            <input type="text" value="{{{ $recurso->genero or '' }}}" class="form-control" id="RC_genero"  name="genero" required>

                                    </div>
                                    <div class="form-group">
                                            {!! Form::label('categoria', 'Categoria') !!}
                                            <input type="text" value="{{{ $recurso->categoria or '' }}}" class="form-control" id="RC_categoria"  name="categoria" required>
                                             
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
                                    <button type="buttom" id="btnf1" class="btn btn-info">Continuar</button> 
                            </form>
                              
                        </div>
                    </div>
                    </div>
                </div>
        </div>

    </div>

</div>
    
@endsection