$(document).ready(function() {

    $('.dynamic').change(function(){  
        if($(this).val()!= ''){
            var select = $(this).attr('id');
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var _token = $('input[name="_token"]').val();
        
            $.ajax({
                url: "getmunicipio/fetch",
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent},

                success:function(result){
                    $('#'+dependent).html(result);
                }
            })
        }
    });

});