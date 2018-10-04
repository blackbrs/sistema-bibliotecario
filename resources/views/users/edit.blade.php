@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Informacion del Usuario
                </div>
                <div class="panel-body">
                        {!! Form::model($user, ['route'=> ['users.update', $user->id],
                        'method'=>'PUT']) !!}
       
                        @include('users.partials.form')
 
                        {!! Form::close() !!}
                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection