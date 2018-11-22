<div class="form-group">
        {!! Form::label('nombres', 'Nombre del Autor:') !!}
        {!! Form::text('nombres', null, ['class'=>'form-control','required']) !!}
</div>
        
        <div class="form-group">
            {!! Form::label('apellidos', 'Apellido del Autor:') !!}
            {!! Form::text('apellidos', null, ['class'=>'form-control','required']) !!}
        </div>
 <div class="form-group">
                {!! Form::submit('Guardar',['class'=>'btn btn-sm btn-primary']) !!}
 </div>   