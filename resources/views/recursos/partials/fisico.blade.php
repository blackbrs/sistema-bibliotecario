<div class="form-group">
        {!! Form::label('copias', 'Cantidad de copias') !!}
        <input type="number" min=1 value="{{{ $fisico->copias or '' }}}" class="form-control" id="copias"  name="copias" required>
        </div>
        <div class="form-group">
                {!! Form::label('unidadesDisponibles', 'Unidades disponibles') !!}
                <input type="number" min=0 value="{{{ $fisico->unidadesDisponibles or '' }}}" class="form-control" id="unidadesDisponibles"  name="unidadesDisponibles" required>        
         </div>
        <div class="form-group">
                {!! Form::label('prestamosRealizados', 'Prestamos realizados') !!}
                <input type="number" min=0 max=99 value="{{{ $fisico->prestamosRealizados or 0 }}}" class="form-control" id="prestamosRealizados"  name="prestamosRealizados" 
                data-toggle="tooltip" data-placement="top" title="Dejar vacio o en 0 si no se ha prestado anteriormente" required>
        </div>
        @if ($pr == 'CD' || $r == 'DVD')
        @include('recursos.fisico.cd-dvd')
        @else
        @include('recursos.fisico.'.$pr)
        @endif
       
       