var dep='';
var tabla ='';
 $(document).ready(function() {
        tabla =  $('#users').DataTable( {
                    "responsive": true,
                    "serverSide": true,
                    "autoWidth": true,
                    "ajax": {
                        "url":"api/stats",
                        "data":function(d){d.dep = dep}
                    },
                    "columns":[
                        {data:'id',name:'users.id'},
                        {data:'nombres',name:'users.nombres'},
                        {data:'apellidos',name:'users.apellidos'},
                        {data:'telefono',name:'users.telefono'},
                        {data:'email',name:'users.email'},
                        {data:'nMunicipio',name:'municipios.nMunicipio'}      
        ],
            "language": {
                "search": "Buscar:",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "La busqueda no coincide con ningun registro",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(De _MAX_ registros totales)",
                "paginate": {"previous": "Anterior",  "next": "siguiente"}
                }
        });
    });
AmCharts.makeChart("map",{
    "type": "map",
    "addClassNames": true,
    "fontSize": 15,
    "color": "#FFFFFF",
    "projection": "mercator",
    "backgroundAlpha": 1,
    "backgroundColor": "rgba(80,80,80,1)",
    "zoomOnDoubleClick": false,
    "dragMap": false,
    "dataProvider": {
        "map": "elSalvador",
        "getAreasFromMap": true,
    },
    "balloon": {
        "horizontalPadding": 15,
        "borderAlpha": 0,
        "borderThickness": 1,
        "verticalPadding": 15
    },
    "areasSettings": { // Cambiar parametros de estilo para las areas
        "color": "rgba(129,129,129,1)",
        "outlineColor": "rgba(80,80,80,1)",
        "rollOverColor": "rgba(79, 128, 27, 1)",
        "rollOverOutlineColor": "rgba(80,80,80,1)",
        "rollOverBrightness": 20,
        "selectedBrightness": 30,
        "selectable": true,
        "unlistedAreasAlpha": 0,
        "unlistedAreasOutlineAlpha": 0
    },
    "imagesSettings": {
        "alpha": 1,
        "color": "rgba(129,129,129,1)",
        "outlineAlpha": 0,
        "rollOverOutlineAlpha": 0,
        "outlineColor": "rgba(80,80,80,1)",
        "rollOverBrightness": 20,
        "selectedBrightness": 20,
        "selectable": true
    },
    "linesSettings": {
        "color": "rgba(129,129,129,1)",
        "selectable": true,
        "rollOverBrightness": 20,
        "selectedBrightness": 20
    },
    "zoomControl": {
        "zoomControlEnabled": false,
        "homeButtonEnabled": false,
        "panControlEnabled": false,
    },
    "listeners": [{
        "event": "clickMapObject",
        "method": function(event) {
            if(dep != event.mapObject.id){
            dep = event.mapObject.id;
            tabla.ajax.reload();  }            
}
      }
    ]
});