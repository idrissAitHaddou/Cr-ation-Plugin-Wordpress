<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<br><br>

<?php

global $wpdb;
$results = $wpdb->get_results( 
  $wpdb->prepare("SELECT * FROM wp_custom_plugin_params") 
);
$validateName = $results[0]->name;
$validateEmail = $results[0]->email;


?>

  <form class="form-horizontal" action="#" id="frmCheck">

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input <?php if($validateEmail!=0){ echo 'checked'; } ?> type="checkbox" id="checkEmail" name="checkEmail"> Email</label>
        </div>
      </div>
    </div>
    <br><br>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input <?php if($validateName!=0){ echo 'checked'; } ?> type="checkbox" id="checkName" name="checkName"> Name</label>
        </div>
      </div>
    </div>
    <br><br>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Save</button>
      </div>
    </div>

  </form>



</body>
</html>