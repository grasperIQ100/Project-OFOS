<?php
session_start();
if(isset($_SESSION['aid']))
{
include("../frames/adminheader.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Pop-up Offer</title>

</head>

<body>
	<?php 
	include("../data_request_handeller/conn.php");
	$fo=mysql_query("SELECT * from disp_offer ");
	
	?>
	<div class="row">
		<h2 align="center">Give Exciting Offers to your Customers</h2>
		<div class="col-xs-12 col-md-6">	
			<table class="table">
    			<thead>
      				<tr>
        				<th>Name</th>
        				<th>Price</th>
        				<th>Desc.</th>
      				</tr>
    			</thead>
    				
    			<tbody>
   					<?php
					while($row=mysql_fetch_array($fo))
					{
    					echo"<tr>
				<td>".$row['name']."</td>
				<td>".$row['price']."</td>
				<td>".$row['des']."</td>";
				if($row['is_active']=='0')
				{
					echo"<td><a href='../data_request_handeller/cancel_pop_offer.php?id=".$row['id']." ' alt='cancel offer'><span class='glyphicon glyphicon-remove' ></span></a></td>
										</tr>";
				}
			"</tr>";
					}
					?>
    			</tbody>
			</table>
		</div>
		<div class="col-md-1"></div>
		<div class="col-xs-12 col-md-3">
			<h3>Add New Offer</h3>	
			<form action="../data_request_handeller/set_dispoff.php" method="post">
				<input type="text" class="form-control" name="offnm" placeholder="Offer Name" required/><br>
				<input type="text" class="form-control" name="offds" placeholder="Offer Price" required/><br>
				<textarea class="form-control" name="desc" placeholder="description"></textarea><br>
				<input type="submit" class="form-control" name="sb" />
			</form>
		</div>
		
	</div>
</body>
<?php include("../frames/adminfooter.php"); ?>
</html>
<?php
}
else
{
	header("location:../adminlogin.php");
}
?>