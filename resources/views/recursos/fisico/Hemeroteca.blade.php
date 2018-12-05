<div class="form-group">
    {!! Form::label('nombreColeccion', 'Nombre de la coleccion principal') !!}
    <input type="text"  class="form-control" id="nombreColeccion"  name="nombreColeccion" required>            
</div>
<div class="form-group">
        {!! Form::label('fechaCreacion', 'Fecha de creacion') !!}
        <input type="date"  class="form-control" id="fechaCreacion"  name="fechaCreacion"  min="{{$recurso->año}}-01-01" max="2018-12-04" required>            
    </div>  