$(document).ready(function() {

    $('.dynamic').change(function(){
        console.log(e);
        if($(this).val()!='') {
            var select = $
            $.ajax({
                url: '/municipio/get/'+municipioId,
                type:"GET",
                crossDomain: true,
                dataType:"json",
                success:function(data) {

                    $('select[name="municipio"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="municipio"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
            });
        } else {
            $('select[name="municipio"]').empty();
        }

    });

});