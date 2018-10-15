<div class="form-group">
    {!! Form::label('nombres', 'Nombres') !!}
    {!! Form::text('nombres', null, ['class'=>'form-control'],'required') !!}
</div>
<div class="form-group">
        {!! Form::label('apellidos', 'Apellidos') !!}
        {!! Form::text('apellidos', null, ['class'=>'form-control'],'required') !!}
</div>
<div class="form-group">
        {!! Form::label('nacimiento', 'Fecha de nacimiento') !!}
        {!! Form::text('nacimiento', null, ['class'=>'form-control'],'required') !!}
</div>
<div class="form-group">
        {!! Form::label('sexo', 'Sexo') !!}
        {!! Form::text('sexo', null, ['class'=>'form-control'],'required') !!}
</div>
<div class="form-group">
        {!! Form::label('Npadres', 'Nombre del Padre o Madre') !!}
        {!! Form::text('Npadres', null, ['class'=>'form-control'],'required') !!}
</div>

<div class="form-group">
        {!! Form::label('telefono', 'Numero de contacto') !!}
        {!! Form::number('telefono', null, ['class'=>'form-control'],'required') !!}
</div>
<div class="form-group">
        {!! Form::label('email', 'Correo electronico') !!}
        {!! Form::email('email', null, ['class'=>'form-control'],'required') !!}
</div>

<hr>
<h3>Lista de roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach ($roles as $role)
        <li>
            <label >
              {{ Form::checkbox('roles[]', $role->id, null) }}  
              {{ $role->name }}
              <em>({{ $role->description ?: 'N/A'  }})</em>
            </label>
        </li>
            
        @endforeach

    </ul>
</div>
<div class="form-group">
        {!! Form::submit('Guardar',['class'=>'btn btn-sm btn-primary']) !!}
</div>