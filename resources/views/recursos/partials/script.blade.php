<script defer>
        $(document).ready(function() {
            checkRB();
            $("input:radio").change(function() {
                $('#principal').prop('selectedIndex',0);
                checkRB();
                });
            $("#versionAlt").on('change', function() {
                if ($(this).is(':checked')) {$(this).attr('value', '1');} 
                else {$(this).attr('value', '0');}
                });
            function checkRB(){
                let lb = document.getElementById('lb1');
                if(document.getElementById('fisicoRB').checked){
                    $('.opcDig').hide();
                    $('.opcFis').show();
                    $('#versionAlt').show();
                    lb.innerText = "\tIncluir una version alt. en digital";
                }
                else if(document.getElementById('digitalRB').checked){
                    $('.opcFis').hide();
                    $('.opcDig').show();
                    $('#versionAlt').show();
                    lb.innerText = "\tIncluir una version alt. en fisico";
                }
                else{
                    $('#versionAlt').hide();
                    $('.opcDig').hide();
                    $('.opcFis').hide();
                }
            
            }
             
            });
</script>
