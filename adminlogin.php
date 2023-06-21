<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Admin Login</title>
</head>

<body background="assets/images/light_grey.png" >
<img src="assets/images/logo.png"/>
<form action="data_request_handeller/loginck.php" method="post">
<div class="row" style="margin-top: 10%; text-align: center;">
	<div class="col-xs-2 col-md-5"></div>
	<div class="col-xs-8 col-md-2">
		<h2>Admin Login</h2>
		<div class="form-group">
   			<input type="hidden" name="id" value="admin">
    		<input type="text" name="unm" class="form-control" id="email" placeholder="Username">
 		 </div>
  		<div class="form-group">
    		<input type="password" name="pw" class="form-control" id="pwd" placeholder="Password">
  		</div>
			<input type="submit" name="sb">
	</div>
</div>
</form>

</body>
</html>