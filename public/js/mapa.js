AmCharts.makeChart("map",{
    "type": "map",
    "pathToImages": "http://www.amcharts.com/lib/3/images/",
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
        "areas": [{
      "id":"SV-AH",
      "title":"Ahuachapán",  
      "selectable": true
    }, {
      "id":"SV-CA",
      "title":"Cabañas",
      "selectable": true
    }, {
      "id":"SV-CH",
      "title":"Chalatenango",
      "selectable": true
    }, {
        "id":"SV-CU",
        "title":"Cuscatlán",
        "selectable": true
    }, {
        "id":"SV-LI",
        "title":"La Libertad",
        "selectable": true
    }, {
        "id":"SV-MO",
        "title":"Morazán",
        "modalUrl": "",
        "selectable": true
    }, {
        "id":"SV-PA",
        "title":"La Paz",
        "selectable": true
    }, {
        "id":"SV-SA",
        "title":"Santa Ana",
        "selectable": true
    }, {
        "id":"SV-SM",
        "title":"San Miguel",
        "selectable": true
    }, {
        "id":"SV-SO",
        "title":"Sonsonate",
        "selectable": true
    }, {
        "id":"SV-SV",
        "title":"San Vicente",
        "selectable": true
    }, {
        "id":"SV-UN",
        "title":"La Unión",
        "selectable": true
    }, {
        "id":"SV-US",
        "title":"Usulután",
        "selectable": true
    }, {
        "id":"SV-SS",
        "title":"San Salvador",
        "selectable": true
    },
]
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
           /* $.fancybox.open({
                src  : event.mapObject.modalUrl,
                type : 'iframe',
                opts : {
                    caption: "Stats Mamalonas ALV XD",
                    toolbar  : false,
                    smallBtn : true,
                    iframe : {
                        
                    },
                    beforeClose : function( instance, current ) {
                        console.info( 'closing!' );
                    }
                }
            });*/
        }
      }]
});