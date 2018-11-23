<div class="form-group">
    {!! Form::label('nombre', 'Nombre del Editorial:') !!}
    {!! Form::text('nombre', null, ['class'=>'form-control','required']) !!}
</div>
    
    
<div class="form-group">
            {!! Form::submit('Guardar',['class'=>'btn btn-sm btn-primary']) !!}
</div>   