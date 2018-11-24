<div class="form-group">
    {!! Form::label('editorial', 'Editorial') !!}
    <input type="text" value="{{{ $recurso->editorial or '' }}}" class="form-control" id="editorial"  name="editorial" required>  
    </div>
    <div class="form-group">
         {!! Form::label('volumen', 'Volumen') !!}
        <textarea type="text"  class="form-control" id="volumen" name="volumen" style="resize: none;" required>{{{ $recurso->descripcion or '' }}}</textarea>     
    </div>
    <div class="form-group">
            {!! Form::label('ISBN', 'ISBN') !!}
            <input type="text" value="{{{ $resclass->ISBN or '' }}}" class="form-control" id="ISBN"  name="ISBN" required>            
     </div>
    <div class="form-group">
            {!! Form::label('paginas', 'Paginas') !!}
            <input type="number" value="{{{ $resclass->paginas or '' }}}" class="form-control" id="paginas"  name="paginas" required>
    </div> 