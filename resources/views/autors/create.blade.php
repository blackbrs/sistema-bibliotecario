@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class=" panel panel-default">
                         <div class="card-header">
                        <div class="panel-heading"> Autor A ingresar </div>
                         </div>
                         <div class="card-body">
                        <div class="panel-body">
                                
                                {!! Form::open(['route'=>'autors.store']) !!}
                                @include('autors.partials.form')
                                {!! Form::close() !!}

                                
                        </div>
                    </div>
                    </div>
                </div>
        </div>

    </div>

</div>
    
@endsection