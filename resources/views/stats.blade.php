@extends('layouts.app')
@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-html5-1.5.4/b-print-1.5.4/fh-3.1.4/r-2.2.2/datatables.min.css"/>
<link rel="stylesheet" href="css/mapa.css">
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-html5-1.5.4/b-print-1.5.4/fh-3.1.4/r-2.2.2/datatables.min.js" defer></script>
<script type="text/javascript" src={{ asset('js/ammap.js') }}></script>
<script type="text/javascript" src={{ asset('js/ElSalvador.js') }}></script>
<script type="text/javascript" src={{ asset('js/mapa.js') }}></script>
<script>
    $(document).ready(function() {
        $('#users').DataTable( {
            "fixedColumns": true,
            "serverSide": true,
            "autoWidth": true,
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

                </div>
              </div>
            </div>
    
    
        </div>
    </div>
</div>
@endsection
