<!-- extends('layouts.app')-->
@extends('layouts.admin')
@section('header')

<link rel="stylesheet" href="css/mapa.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/datatables.min.js" defer></script>
<link rel="stylesheet" href="css/td.css">
<script type="text/javascript" src={{ asset('js/ammap.js') }}></script>
<script type="text/javascript" src={{ asset('js/ElSalvador.js') }}></script>
<script type="text/javascript" src={{ asset('js/mapa.js') }} defer></script>

@endsection
@section('content')
<div class="container-fluid">
    <div class="card">
            <div class="card-header">
              <h3 class="card-title">Usuarios Del Sistema Bibliotecario</h3>
    
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
                    <div class="row">
                            <div id="map" class="col-md-6">
                            </div>
                            <div id="usdiv" class="col-md-6 col-sm-12">
                                            <table id="users" class="table table-striped table-hover" style="width: 100%;" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th >Nombres</th>
                                                        <th>Apellidos</th>
                                                        <th>telefono</th>
                                                        <th>e-mail</th>
                                                        <th>municipio</th>
                                                        <th>municipio</th> 
                                                    </tr>
                                                </thead>
                                            </table>
                            </div>
                        </div>
            </div>
          </div>
    
    <div class="card card-shadow">
    </div>
</div>
@endsection
