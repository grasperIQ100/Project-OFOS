<?php 
session_start();
if(isset($_SESSION['aid']))
{
include("../frames/adminheader.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Report</title>
</head>

<body>
 	<div class="row">
		 <div class="col-xs-1 col-md-4"></div>
		 	<div class="col-xs-10 col-md-4">
		 		<h2>Generate Sales Report</h2>
				 <form method="post" action="../data_request_handeller/gen_report.php">
					<input type="date" class="form-control" name="dto" placeholder="From" /><br>
					<input type="date" class="form-control" name="dtt" placeholder="To" /><br>
					<input type="submit" name="sb">
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
	header("location:../index.php");
}
?>