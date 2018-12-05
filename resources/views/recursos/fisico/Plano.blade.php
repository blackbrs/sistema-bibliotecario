<div class="form-group">
    {!! Form::label('dimension', 'dimension') !!}
    <input type="text"  class="form-control" id="dimension"  name="dimension" required>            
</div>
    <div class="form-group">
        {!! Form::label('fechaCreacion', 'Fecha de creacion') !!}
        <input type="date"  class="form-control" id="fechaCreacion"  name="fechaCreacion"  min="{{$recurso->año}}-01-01" max="2018-12-04" required>            
    </div>           
</div>