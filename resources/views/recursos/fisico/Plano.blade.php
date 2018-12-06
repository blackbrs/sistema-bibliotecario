<div class="form-group">
        {!! Form::label('Dimension', 'Dimension') !!}
        <select class="form-control" id="dimension"  name="dimension" required>
              <option >A0</option>
              <option >A1</option>
              <option >A2</option>
              <option >A4</option>
              <option >A5</option>
              <option >A6</option>
              <option >B0</option>
              <option >B1</option>
              <option >B2</option>
              <option >B3</option>
              <option >B4</option>
              <option >Otro</option>      
              </select>            
 </div>
    <div class="form-group">
        {!! Form::label('fechaCreacion', 'Fecha de creacion') !!}
        <input type="date"  class="form-control" id="fechaCreacion"  name="fechaCreacion"  min="{{$recurso->año}}-01-01" max="2018-12-04" required>            
    </div>           
