<div class="form-group">
{!! Form::label('nombreBiblioteca', 'Nombre de la biblioteca') !!}
{!! Form::text('nombreBiblioteca', null, ['class'=>'form-control'],'required') !!}
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Ubicacion del lugar:') !!}
    {!! Form::text('direccion', null, ['class'=>'form-control'],'required') !!}
</div>

<div>
    {!! Form::label('telefono', 'Numero de telefono') !!}
    {!! Form::number('telefono', null, ['class'=>'form-control'],'required') !!}  
</div>

<div class="form-group">
        {!! Form::label('nombreEncargado', 'Nombre del encargado') !!}
        {!! Form::text('nombreEncargado', null, ['class'=>'form-control'],'required') !!}
       
        
  </div>

<div class="form-group">
        {!! Form::submit('Guardar',['class'=>'btn btn-sm btn-primary'],'required') !!}
</div>