@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class=" panel panel-default">
                         <div class="card-header">
                        <div class="panel-heading"> ROL </div>
                         </div>
                         <div class="card-body">
                        <div class="panel-body">     
                                {!! Form::open(['route'=>'roles.store']) !!}
                               
                                @include('roles.partials.form')
                                
<<<<<<< HEAD
                                {!! Form::close() !!}

                            
=======
                                {!! Form::close() !!}   
>>>>>>> 2f97a853b844d920f18b48771bac0f72a5168829
                        </div>
                    </div>
                    </div>
                </div>
        </div>

    </div>

</div>
    
@endsection