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

<div class="container">
  <form action="#" id="frmPostOtherPage">
    <div class="form-group">
      <label for="email">Name for other page :</label>
      <input type="text" id="textName" required class="form-control" placeholder="Enter name" name="textName">
    </div>
    <div class="form-group">
      <label for="pwd">Email for other page :</label>
      <input type="email" class="form-control" required id="textEmail" placeholder="Enter email" name="textEmail">
    </div>
    <button type="submit" class="btn btn-default" id="btnSubmit">Submit</button>
  </form>
</div>

</body>
</html>
