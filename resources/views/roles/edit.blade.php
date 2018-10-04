@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class=" panel panel-default">
                <div class="panel-heading"> Rol a actualizar </div>
                <div class="panel-body">
                        
                        {!! Form::model($role, ['route'=>['roles.update', $role->id],
                        'method' => 'PUT']) !!}

                        @include('roles.partials.form')
                        
                        {!! Form::close() !!}

                        
                </div>

            </div>

        </div>

    </div>

</div>
    
@endsection