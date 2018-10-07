@extends('layouts.app')

@section('content')
<div class="container">
    
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                        <div class="card">
                            <div class="panel panel-default">
                                    <div class="card-header">
                                <div class="panel-heading"> Informacion del Usuario</div>
                                    </div>
                                    <div class="card-body">
                                            <div class="panel-body">
                                                    {!! Form::model($user, ['route'=> ['users.update', $user->id],'method'=>'PUT']) !!}
                                
                                                    @include('users.partials.form')
                            
                                                    {!! Form::close() !!}
                                                    
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-danger" > Cancelar y volver</a>
                                    </div>

                            </div>
                        </div>
                </div>
            </div>
        
</div>
@endsection