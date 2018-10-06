$(document).ready(function() {

    $('select[name="dept"]').on('change', function(e){
        console.log(e);
        var municipioId = $(this).val();
        if(municipioId) {
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