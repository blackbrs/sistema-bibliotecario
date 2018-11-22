<script>
        $(document).ready(function() {
            if($('#principal').val() != "-1"){ 
                $('#changeTR').show();
            }
            $("input:radio").change(function() {
                $('#changeTR').hide();
                $('#principal').prop('selectedIndex',0);
                $('#principal').prop('disabled',false);
                if(document.getElementById('fisicoRB').checked){
                $('.opcDig').removeClass('show');
                $('.opcFis').addClass('show');
                }
                else {
                $('.opcFis').removeClass('show');
                $('.opcDig').addClass('show');
                }
            });
        });
</script>
<script>
function enableTR() {
    $('#principal').prop('disabled',false);
    $('#changeTR').hide();
    }
</script>
<style>
        .opcFis {
            display: none;
        }
        .opcDig {
            display: none;
        }
        .opcDig.show {
            display: block;
        }
        .opcFis.show{
            display: block;
        }
</style>