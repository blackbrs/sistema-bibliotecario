<div class="form-group">
{!! Form::label('nombreBiblioteca', 'Nombre de la biblioteca') !!}
{!! Form::text('nombreBiblioteca', null, ['class'=>'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Ubicacion del lugar:') !!}
    {!! Form::text('direccion', null, ['class'=>'form-control','required']) !!}
</div>

<div>
    {!! Form::label('telefono', 'Numero de telefono') !!}
    {!! Form::number('telefono', null, ['class'=>'form-control','required']) !!}  
</div>

<div class="form-group">
        {!! Form::label('nombreEncargado', 'Nombre del encargado') !!}
        <div class="form-group">
<<<<<<< HEAD
            <select name="nombreEncargado" id= "nombreEncargado" class="form-control" required>
=======
            <select name="nombreEncargado" id= "userSelect" class="form-control" required>
>>>>>>> b8971d051006616972fff04dfcf34007386e2446
                <option value="">--Encargado--</option>
                @foreach ($usuarios as $user)
                <option value="{{ $user->nombres }}"> {{ $user->nombres}} {{ $user->apellidos}}</option>  
                @endforeach
            </select>    
  </div>
       
        
  </div>

<div class="form-group">
        {!! Form::submit('Guardar',['class'=>'btn btn-sm btn-primary']) !!}
</div>