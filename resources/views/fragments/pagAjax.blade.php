<!--

Paginacion con AJAX

<script type="text/javascript" defer>
    $(document).ready(function() {

        $('body').on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];  
            fetch(page);
        });
    
        function fetch(page) {
            $.ajax({
                url : "/roles/create/fetch?page="+page,
                success:function(data){
                    $('#permissions-group').html(data)
                }
            })
        }
    });  
    </script>
--> 
