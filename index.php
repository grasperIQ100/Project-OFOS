<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Meri Kitchen | Home</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $(".adbar").show( "slide",200 );
});
</script>
</head>
<body>
	<?php include("frames/header.php");?>
	<div class=" row">
	<div class="col-xs-12 col-md-12"  style=" height: auto;  z-index: -1;">
	<div class="adbar">
		<img src="assets/images/fork.png" ><br>
		<h4>Delicious Food</h4>
	</div>
	<div class="adbar">
		<img src="assets/images/deli.png"><br>
		<h4>Faster Delivery</h4>
	</div>
	<div class="adbar">
		<img src="assets/images/doll.png"><br>
		<h4>Exciting Offers</h4>
	</div>
</div>
</div>
<?php include("frames/footer.php"); ?>
</body>
</html>