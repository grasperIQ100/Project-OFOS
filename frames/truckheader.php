<?php session_start(); ?>
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
<link rel="stylesheet" type="text/css" href="../assets/css/main.css" />
</head>

<body>
<div style="height: auto; width: 100%;">
<nav class="navbar navbar-default" style="background-color:antiquewhite; border: none;"><!-- admin header menu -->
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      	<img src="../assets/images/logo.png" style="height: auto; width: 100%;" />
      </div>
      <div class="collapse navbar-collapse" id="myNavbar"><menu>
      <ul class="nav navbar-nav navbar-right" style="margin-right: 10%;">
        <li><a href="adminindex.php" style="color: black; font-size: 2rem;">Orders</a></li>  
        <li><a href="../data_request_handeller/logout.php" id="lg" style="color: black; font-size: 2rem;">Logout</a></li>
      </ul></menu>
    </div>
 </div>
</nav>
</div>
</body>
</html>