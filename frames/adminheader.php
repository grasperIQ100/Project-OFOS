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




<link rel = "stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>


</head>

<body>
<div style="height: auto; width: 100%; ">
<nav class="navbar navbar-default" style="background-color:moccasin; border: none;"><!-- admin header menu -->
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
      <ul class="nav navbar-nav navbar-right" style="margin-right: 6%;">
        <li><a href="adminindex.php" style="color: black; font-size: 2rem;">Orders</a></li>  
        
        <li class="dropdown">
        	
							<a class="dropdown-toggle"  data-toggle="dropdown" href="#" > Reports
							<span class="caret"></span></a>
							<ul class="dropdown-menu" id="file">
							  <li><a href="reports.php" style="color: black; font-size: 2rem;">Sales Reports</a></li>  
                                <li><a href="income.php" style="color: black; font-size: 2rem;">Income Reports</a></li>
                                
							</ul>
		</li>
        
        <li><a href="delivery.php" style="color: black; font-size: 2rem;">Delivery</a></li>
        <li><a href="truck.php" style="color: black; font-size: 2rem;">Trucks</a></li>
        <li><a href="popoff.php" style="color: black; font-size: 2rem;">Pop-up Offers</a></li>
        
          <li class="dropdown">
        	
							<a class="dropdown-toggle"  data-toggle="dropdown" href="#" > Manage
							<span class="caret"></span></a>
							<ul class="dropdown-menu" id="file">
							  <li><a href="setthali.php" style="color: black; font-size: 2rem;">Thali </a></li>
                                <li><a href="setmenu.php" style="color: black; font-size: 2rem;">Thali Menu</a></li>
                                <li><a href="set_area.php" style="color: black; font-size: 2rem;">Area</a></li>
                                <li><a href="gst.php" style="color: black; font-size: 2rem;">GST</a></li>
							  <li><a href="set_offer.php" style="color: black; font-size: 2rem;">Coupon Code</a></li>
							  
							</ul>
		</li>
        
        <li><a href="viewmess.php" style="color: black; font-size: 2rem;">Feeds</a></li>
        <li><a href="../data_request_handeller/logout.php" id="lg" style="color: black; font-size: 2rem;" onclick="return confirm('Are you sure you want to log out?');">Logout</a></li>
      </ul></menu>
    </div>
 </div>
</nav>
</div>
</body>
</html>
