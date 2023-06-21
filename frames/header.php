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
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="./assets/css/main.css" />
<link rel="stylesheet" type="text/css" href="./assets/css/slider.css" />
<!--<script>
$(document).ready(function(){
    $("#lg").click(function(){
    	$(".login").css("display", "block");
	});
});
</script>-->
	
			
</head>

<body>
<div style="height: auto; width: 100%; position: absolute; z-index: 1;">
<nav class="navbar navbar-default" style="background-color:transparent; border: none;"><!-- header menu -->
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      	<img src="./assets/images/logo.png" style="height: auto; width: 100%;" />
      </div>
      <div class="collapse navbar-collapse" id="myNavbar"><menu>
      <ul class="nav navbar-nav navbar-right" style="margin-right: 10%;">
<!--        <li><a href="index.php" style="color: black; font-size: 2.5rem;">Home</a></li>     
        <li><a href="#" style="color: black; font-size: 2.5rem;">About</a></li>
        <li><a href="#" style="color: black; font-size: 2.5rem;">Pricing</a></li>
-->      </ul></menu>
    </div>
 </div>
</nav>
</div>
<div class="row">
<div class="col-xs-1 col-md-2"></div>
<div class="col-xs-10 col-md-4">
<div class="login">
	<h2>Login & Enjoy your food!</h2>
	<form action="./data_request_handeller/loginck.php" method="post">
		<input type="hidden" name="id" value="users" />
		<input type="email" name="unm" class="frm" placeholder="Enter Email" required><br>
		<input type="password" name="pw" class="frm" placeholder="Enter Password" required><br><br>
		<button type="submit" name="sb" style="height: 30px; width: 150px; color: black;">Get Me Food!</button>
	</form>
	Not Yet Tried ?<a href="register.php">Register Now!</a>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-md-12" style=" height: 768px; ">
  <div class="slide1 col-xs-12 col-md-12"></div>
  <div class="slide2 col-xs-12 col-md-12"></div>
  <div class="slide3 col-xs-12 col-md-12"></div>
</div>
</div><!-- background image -->

</body>
</html>