@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class=" panel panel-default">
                         <div class="card-header">
                        <div class="panel-heading"> Biblioteca </div>
                         </div>
                         <div class="card-body">
                        <div class="panel-body">
                                
                                {!! Form::open(['route'=>'bibliotecas.store']) !!}
                                @include('bibliotecas.partials.form')
                                {!! Form::close() !!}

                                
                        </div>
                    </div>
                    </div>
                </div>
        </div>

    </div>

</div>
    
@endsection