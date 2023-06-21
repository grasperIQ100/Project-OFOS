<?php
session_start();
if(isset($_SESSION['uid']))
{
	?>
<?php include("frames/userheader.php"); ?>

<!doctype html>

<html>

<head>

<meta charset="utf-8">

<title>Truck Orders</title>

</head>



<body>

	<div class="row">

		<div class="col-xs-1 col-md-4"></div>

		<div class="col-xs-10 col-md-4">

			<form>

				<input type="hidden" name="date" value=""><br>

				

			</form>

		</div>

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