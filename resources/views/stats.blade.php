@extends('layouts.app')
@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-html5-1.5.4/b-print-1.5.4/fh-3.1.4/r-2.2.2/datatables.min.css"/>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-html5-1.5.4/b-print-1.5.4/fh-3.1.4/r-2.2.2/datatables.min.js" defer></script>
<script>
    $(document).ready(function() {
        $('#users').DataTable( {
            "serverSide": true,
            "ajax": "{{ url('api/stats') }}",
            "columns":[
                {data:'id'},
                {data:'nombres'},
                {data:'apellidos'},
                {data:'telefono'},
                {data:'email'},
                {data:'municipio'},
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
<div class="container">
        <div class="row justify-content-center">
          <div class="row">
             
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
                                      <th width="10px" >ID</th>
                                      <th class="">Nombres</th>
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
@endsection
