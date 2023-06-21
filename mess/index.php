<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lets Deliver Some Food</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="../assets/css/main.css"/>

</head>
<body>
	<div class="row" style="margin-top: 10%; text-align: center;">
	<div class="col-xs-2 col-md-5"></div>
	<div class="col-xs-8 col-md-2">
		<img src="../assets/images/logo.png" height="100%" width="100%" />
		<h2>Let's Deliver Some Food!</h2>
		<form method="post" action="../data_request_handeller/loginck.php"/>
		<div class="form-group">
   			<input type="hidden" name="id" value="mess">
    		<input type="text" name="unm" class="form-control" id="email" placeholder="Mess ID">
 		 </div>
  		<div class="form-group">
    		<input type="password" name="pw" class="form-control" id="pwd" placeholder="Password">
  		</div>
			<input type="submit" name="sb" class="form-control" >
	</div>
</div>
</body>
</html>