@extends('layouts.app')
@include('fragments.main_script_tags')
<script src="js/selbox.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registro de usuarios</div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label text-md-right">Nombres</label>

                            <div class="col-md-6">

                                <input id="nombres" type="text" class="form-control{{ $errors->has('nombre') ? ' has-error' : '' }}" name="nombres" value="{{ old('nombres') }}" required autofocus>

                                @if ($errors->has('nombres'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="apellidos" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text" class="form-control{{ $errors->has('apellidos') ? ' has-error' : '' }}" name="apellidos" value="{{ old('apellidos') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="nacimiento" class="col-md-4 col-form-label text-md-right">Fecha de nacimiento</label>

                            <div class="col-md-6">
                            <input id="nacimiento" type="text" class="form-control{{ $errors->has('nacimiento') ? ' has-error' : '' }}" name="nacimiento" value="{{ old('nacimiento') }}"  placeholder="YYYY-MM-DD" required autofocus>

                                @if ($errors->has('nacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sexo" class="col-md-4 col-form-label text-md-right">Sexo</label>

                            <div class="col-md-6">
                                <select name="sexo" id= "sexo" class="form-control" required>
                                    <option value="">--Sexo--</option>
                                    <option value="Masculino"> Masculino</option>
                                    <option value="Femenino">Femenino</option>  
                                </select>
                                @if ($errors->has('sexo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Npadres" class="col-md-4 col-form-label text-md-right">Nombre del padre o madre</label>

                            <div class="col-md-6">
                            <input id="Npadres" type="text" class="form-control{{ $errors->has('Npadres') ? ' has-error' : '' }}" name="Npadres" value="{{ old('Npadres') }}"   required autofocus>

                                @if ($errors->has('Npadres'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Npadres') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">Numero de telefono</label>

                            <div class="col-md-6">
                            <input id="telefono" type="numeric" class="form-control{{ $errors->has('telefono') ? ' has-error' : '' }}" name="telefono" value="{{ old('telefono') }}"   required number>

                                @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="depBox" class="col-md-4 col-form-label text-md-right">Departamento</label>
                            <div class="col-md-6">
                                <select name="dept" id= "dep_id" class="form-control dynamic" data-dependent="nMunicipio">
                                    <option value="">--Departamento--</option>
                                    @foreach ($lista_dep as $dep)
                                    <option value="{{ $dep->id }}"> {{ $dep->nDepartamento }}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nMunicipio" class="col-md-4 col-form-label text-md-right">Municipio</label>
                            <div class="col-md-6">
                                <select name="nMunicipio" id="nMunicipio" class="form-control">
                                 <option>--Municipio--</option>
                             </select>
                         </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirme su contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrarse
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
