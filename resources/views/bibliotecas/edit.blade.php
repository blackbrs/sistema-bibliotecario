@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card">
            <div class=" panel panel-default">
                    <div class="card-header">
                <div class="panel-heading"> Biblioteca a actualizar </div>
                    </div>
                    <div class="card-body">
                <div class="panel-body">
                        
                        {!! Form::model($biblioteca, ['route'=>['bibliotecas.update', $biblioteca->id],
                        'method' => 'PUT']) !!}

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