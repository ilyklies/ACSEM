<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>jQuery UI Autocomplete - Default functionality</title>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
            $(document).ready(function() {
                
                var search = $("#search");
                var search = $("#search");
                var search = $("#search");

                    search.keyup(function() {
                        if (search.val() != '') {       
                        $.post("php/this.php", { search : search.val()}, function(data) {
                            $(".result").html(data);
                        });
                        }
                    });
            });
            $(document).ready(function() {
              $('#modal-6').on('shown.bs.modal', function(e) {
                var id = $(e.relatedTarget).data('id');
                $.ajax({
                    type : 'post',
                    url : 'file.php', //Here you will fetch records or images
                    data :  'id='+ id, //Pass id
                    success : function(data){
                        $('#fetched-data').html(data);//Show fetched data from database
                    }
                });
              });
            });
        </script>
    </head>
    <body>
       
        <div class="result1">
        <br>
        search
        <input type="text" name="search" id="search"/>
        </div>
        <div class="result">
        </div>
    </body>
</html>