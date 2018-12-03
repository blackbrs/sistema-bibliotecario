<div class="form-group">
        {!! Form::label('duracion', 'Duracion en minutos') !!}
        <input type="number" min=1 value="{{{ $resclass->duracion or '' }}}" class="form-control" id="duracion"  name="duracion" required>
        </div>
<div class="form-group">
                {!! Form::label('nPistas', 'Numero de pistas') !!}
                <input type="number" min=1  value="{{{ $resclass->nPistas or '' }}}" class="form-control" id="nPistas"  name="nPistas" required>
        </div> 
