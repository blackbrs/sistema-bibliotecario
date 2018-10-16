@extends('layouts.app')
@section('header')

<link rel="stylesheet" href="css/mapa.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/fh-3.1.4/r-2.2.2/sc-1.5.0/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.4/fh-3.1.4/r-2.2.2/sc-1.5.0/datatables.min.js" defer></script>
<script type="text/javascript" src={{ asset('js/ammap.js') }}></script>
<script type="text/javascript" src={{ asset('js/ElSalvador.js') }}></script>
<script type="text/javascript" src={{ asset('js/mapa.js') }}></script>
<script>
$(document).ready(function() {
                $('#users').DataTable( {
                    "serverSide": true,
                    "responsive": true,
                    "ajax": {
                        "url":'api/stats',
                    },
                    "columns":[
                        {data:'id'},
                        {data:'nombres'},
                        {data:'apellidos'},
                        {data:'telefono'},
                        {data:'email'},
                        {data:'municipio_id'},
                        
                ],
                    "language": {
                        "search": "Buscar:",
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "zeroRecords": "La busqueda no coincide con ningun registro",
                        "info": "Mostrando pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(De _MAX_ registros totales)",
                        "paginate": {
                            "previous": "Anterior",
                            "next": "siguiente"
            }
                        }
                });
            });
</script>
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-shadow">
    <div class="card-body">
    <div class="row">
        <div id="map" class="col-md-8">
        </div>
        <div class="col-md-4">
        </div>
    </div>
    </div>
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="panel panel-default">
                            <div class="card-header">
                                    <div class="panel-heading">
                                          Usuarios Del Sistema Bibliotecario
                                    </div>
                                </div>
                      <div class="card-body">
                        <div class="panel-body">
                            <table id='users' class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th >Nombres</th>
                                        <th>Apellidos</th>
                                        <th>telefono</th>
                                        <th>e-mail</th>
                                        <th>municipio</th>   
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                  </div>
                </div>
</div>
    
    
        </div>
    </div>
</div>
@endsection