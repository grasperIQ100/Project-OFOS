<?php
$user= $_SESSION["uid"];
include("./data_request_handeller/conn.php");
$query=mysql_query("SELECT `name`, `mail`, `mobile`,`wallet_bal`, `ref_code` FROM `users` WHERE `mail`='$user' ") or mysql_errno();
$profile=mysql_fetch_array($query);
?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Meri Kitchen | Home</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="./assets/css/main.css" />
<link rel="stylesheet" type="text/css" href="./assets/css/lightbox.css" />
<script>
    $(function(){
         // Find any date inputs and override their functionality
         $('input[type="date"]').datepicker();
    });
	$('#closemodal').click(function() {
    $('#modalwindow').modal('hide');
});
</script>
<style>
	a { 
    color: black; font-size: 2rem;
}
	a: active { 
    color: blue; font-size: 3rem;
}
li: active
	{
		background-color: black;
	}
</style>
</head>

<body>
<div style="height: auto; width: 100%;">
<nav class="navbar navbar-default" style="background-color:transparent; border: none;"><!-- admin header menu -->
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
        <li><a href="userindex.php" >Today's Menu</a></li>
		<li><a href="#" data-toggle="modal" data-target="#profilemodal" >Profile</a> </li>
        <li><a href="view_orders.php">Orders</a></li>
        <li><a href="history.php">History</a></li>
        <li><a href="truck_order.php">Food Trucks</a></li>
        <li><a href="review.php">Feedback</a></li>
        <li><a href="wallet.php" >Wallet</a></li>
        <li><a href="./data_request_handeller/logout.php" id="lg" onclick="return confirm('Are you sure you want to log out?');">Logout</a></li>
      </ul></menu>
    </div>
 </div>
</nav>
</div>

<div class="modal fade" role="dialog" id="profilemodal" name="profilemodal"> 
  <div class="modal-dialog"> 
<div class= "rows">
    
	<form method="post" action="#">     
    <!-- Modal content--> 
    <div class="modal-content"> 
      <div class="modal-header"> 
        <button type="button" class="close" data-dismiss="modal">&times;</button> 
        <h3 class="modal-title">My Profile</h3> 
        
      </div> 
      <div class="modal-body"> 
		  Name:<label><?php echo $profile["name"] ?></label><br><br>
		  Mobile:<label><?php echo $profile["mobile"] ?></label><br><br>
		  E-mail:<label><?php echo $profile["mail"] ?></label><br><br>
		  Wallet Balance:<label><?php echo $profile["wallet_bal"] ?></label><br><br>
       	Refrell Code:<label><?php echo $profile["ref_code"] ?></label><br><br>
       <center>	<button type="button" class="btn-primary col-md-4" data-dismiss="modal">OK</button></center>
       	<!--<input type="password" class="form-control" name="upw1" placeholder="New Password"/><br>
       	<input type="password" class="form-control" name="upw2"  placeholder="Confirm New Password"/><br>-->
       	</br>
       	       	</br>
	  </div>
	</div>
	</form>
	</div>
</div>
</div>

</body>
</html>