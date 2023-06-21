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
<?php 
$getdate=$_POST["menudate"];

$date= new DateTime($getdate);
include("conn.php");
$ddate=$date->format("Y-m-d");
$dday=$date->format("l") ;
$day=strtolower($dday);
$query=mysql_query("SELECT * FROM `menu` INNER JOIN thali ON menu.reg=thali.id where menu_date='$ddate' ") or mysql_errno();
?>
	<div class="row">
		<div class="col-xs-2 col-md-4"></div>
		<div class="col-xs-8 col-md-4">
			<h2>Menu of <?php echo $ddate; ?></h2>
			<table class="table">
    		<thead>
      			<tr>
        			<th>Name</th>
        			<th>Type</th>
        			<th>Quantity</th>
      			</tr>
    		</thead>
    		<tbody>
    			<?php
					while($row=mysql_fetch_array($query))
					{
						echo"
						<tr>
							<td>".$row['name']."</td>
							<td>".$row['thali']."</td>
							<td>".$row['qty']."</td>
						</tr>";
					}
				?>
			</tbody>
		</table>
		<a href="../userindex.php" class="btn-primary">Go Back</a>
		</div>	
	</div>
</body>
</html>