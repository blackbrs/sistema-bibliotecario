@php( $edt = \App\Editorial::all()) 
<div class="form-group">
    {!! Form::label('editorial', 'Editorial') !!}
    <select name="editorial_id" id= "editorial_id" class="form-control"required >        
        <option value="">Editorial</option>
        @foreach ($edt as $ed)
        <option value="{{ $ed->id }}"> {{ $ed->nombre}} </option>  
        @endforeach
    </select>    
    </div>
    <div class="form-group">
         {!! Form::label('volumen', 'Volumen') !!}
        <input type="text" value="{{{ $resclass->volumen or '' }}}" class="form-control" id="volumen" name="volumen" style="resize: none;" required>     
    </div>
    <div class="form-group">
            {!! Form::label('ISBN', 'ISBN') !!}
            <input type="text" value="{{{ $resclass->ISBN or '' }}}" class="form-control" id="ISBN"  name="ISBN" required>            
     </div>
    <div class="form-group">
            {!! Form::label('paginas', 'Paginas') !!}
            <input type="number" value="{{{ $resclass->paginas or '' }}}" class="form-control" id="paginas"  name="paginas" required>
    </div> 