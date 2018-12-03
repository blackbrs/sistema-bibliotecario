<div class="form-group">
        {!! Form::label('duracion', 'Duracion en minutos') !!}
        <input type="number" min=1 value="{{{ $resclass->duracion or '' }}}" class="form-control" id="duracion"  name="duracion" required>
        </div>