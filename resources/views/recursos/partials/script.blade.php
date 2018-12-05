<script defer>
        $(document).ready(function() {
            $('.opcDual').hide();
            if($("#versionAlt").is(':checked')) {$("#versionAlt").attr('value', '1');}
            checkRB();
            $("input:radio").change(function() {
                $('#principal').prop('selectedIndex',0);
                checkRB();
                });
            $("#versionAlt").on('change', function() {
                if ($(this).is(':checked')) {$(this).prop('value', '1');} 
                else {$(this).attr('value', '0');}
                });

            function checkRB(){
                
                let lb = document.getElementById('lb1');
                if(document.getElementById('fisicoRB').checked){
                    $('.opcDual').show();
                    $('.opcDig').hide();
                    $('.opcFis').show();
                    $('#versionAlt').show();
                    lb.innerText = "\tIncluir una version alt. en digital";
                }
                else if(document.getElementById('digitalRB').checked){
                    $('.opcDual').show();
                    $('.opcFis').hide();
                    $('.opcDig').show();
                    $('#versionAlt').hide();
                    $('#versionAlt').prop('value', '0')
                    $('#versionAlt').prop('checked', false);
                    lb.innerText = "";
                }
                else{
                    $('.opcDual').hide();
                    $('#versionAlt').hide();
                    $('.opcDig').hide();
                    $('.opcFis').hide();
                }
            
            }
             
            });
</script>
