<?php 
session_start();
if(isset($_SESSION['aid']))
{
include("../frames/adminheader.php"); 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
	$getid=$_GET['id'];
	
	include("../data_request_handeller/conn.php");
	$getthali=mysql_query("select * from thali where id='$getid' ");
	$row=mysql_fetch_array($getthali);
	?>
<div class="row">
		 <div class="col-xs-1 col-md-3"></div>
		 	<div class="col-xs-7 col-md-4">
		 		<h2>Update Thali Details</h2>
				 <form method="POST" action="../data_request_handeller/updatethali.php?epr=thalisubmit">
				 	<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
					<input type="text" class="form-control" name="tname" placeholder="Enter Thali Name" value="<?php echo $row['thali']; ?>" /><br>
					<input type="number" class="form-control" name="tprice" placeholder="Thali Price" required value="<?php echo $row['price']; ?>" /><br>
					<input type="submit" name="thalisubmit">
				 </form>
			 </div>
</div>
<?php include("../frames/adminfooter.php"); ?>
</body>
</html>
<?php
	}
else
{
	header("location:../index.php");
}
?>