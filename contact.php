<?php
session_start();
if(isset($_SESSION['uid']))
{
	?>
<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Contact</title>

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/main.css"/>



</head>



<body>

<?php include("header.php"); ?>

<div class="row" style="margin-top: 5%;">

	<form class="form-group" action="inscon.php" method="post">

	<div class="col-xs-1 col-md-1"></div>

	<div class="col-xs-5 col-md-5">

   		<label for="email">Email address:</label>

    	<input type="email" class="form-control" name="mail" id="email">

    </div>

    

</div>

<div class="row" >

	<div class="col-xs-1 col-md-1"></div>

	<div class="col-xs-5 col-md-5">

   		<label for="phone">Phone:</label>

    	<input type="tel" class="form-control" name="cno" id="email">

	</div>

</div>

<div class="row" >

	<div class="col-xs-1 col-md-1"></div>

	<div class="col-xs-5 col-md-5">

   		<label for="phone">Message:</label>

		<textarea class="form-control" rows="5" name="msg" id="comment"></textarea>

	</div>

</div>

<div class="row" style="margin-top: 2%;">

	<div class="col-xs-1 col-md-1"></div>

	<div class="col-xs-5 col-md-5">

	<input type="submit" name="sb" class="btn btn-default"/>

	</div>

	</form>

</div>



</body>

</html>
<?php
}
else
{
	header("location:index.php");
}
?>