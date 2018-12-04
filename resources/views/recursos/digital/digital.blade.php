 @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
@endif
@if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Ha ocurrido un error</strong> Revisa el formato del archivo o su tamaño<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
@endif
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="file" id="file" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">El archivo debe ser {{$recurso->principal}}</small>
                        </div>
