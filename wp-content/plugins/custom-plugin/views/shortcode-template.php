<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

</head>
<body>




<script>
    (function($) {
    $(document).ready(function() {


        $("#frmPost").submit(function(e){
              e.preventDefault();
              var name=$("#textName").val();
              var email=$("#textEmail").val();
              var postdata = "action=custom_plugin_library&param=savedata&email="+email+"&name="+name;
              $.ajax({
                type: "POST",
                url: ajaxurl,
                data: postdata,
                success: function(response){
                    console.log(response);
                },
              });

              $("#textName").val('');
              $("#textEmail").val('');

        });
        });
    })(jQuery);
</script>


</body>
</html>
