<?php 
session_start();
if(isset($_SESSION['mid']))
{
//include("../frames/truckheader.php"); 
include("../data_request_handeller/conn.php");
	date_default_timezone_set("Asia/Kolkata");
	$date =  date('Y-m-d');
?>
<html>
<head>
<meta charset="utf-8">
<title>Today's Delivary </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="../assets/css/main.css" />
<link rel = "stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
 <script>
$(document).ready(function(){
    $('#mytable').dataTable();
});
	 $(document).ready(function(){
    $('#mytable1').dataTable();
});
</script> 

</head>

<body>
<div class="row" style="margin-top: 1%; ">
	<div class="col-xs-1 col-md-1"></div>
	<div class="col-xs-2 col-md-8">
		<img src="../assets/images/logo.png" /></div>
		<div class="col-xs-3 col-md-3">	<center><a href="../data_request_handeller/logout.php" class="btn-primary col-xs-3 col-md-5" style=" height: 40px;" onclick="return confirm('Are you sure you want to log out?');">Log Out</a></center></div>
	</div>
	</div>
	<div class="col-xs-1"></div>
	<div class="col-xs-12 col-md-10">
	<form method="post">
 	 	<label>Select Schedule:</label>
 	 	<select name="sch">
 	 		<option value="0">Lunch</option>
 	 		<option value="1">Dinner</option>
 	 	</select>
 	 	<button type="submit" name="sb">Show</button>
 	 </form>
		<h2>DAILY ORDERS</h2>
		<div class="table-responsive">	
				<div class="col-md-12" style="overflow-x: auto">
				<div class =  "table-bordered results">
					 <table  class="table table-condensed table-bordered table-hover" id="mytable1">
						 <thead>
                                <tr>
									<th>Date</th>
									<th>Thali</th>
									<th>Quantity</th>
								  </tr>
								</thead>
								<tbody>
										<?php
											
										if(isset($_POST['sb']) and isset($_POST['sch']))
										{
											$type=$_POST['sch'];
												$query=mysql_query("SELECT  ot.date, ot.thali, SUM(ot.qty) AS qt, t.thali FROM order_thali_details ot JOIN thali t ON ot.thali=t.id WHERE '$date' = ot.date AND `status`='0' AND `type`='$type' GROUP BY ot.thali");
											while($rows=mysql_fetch_array($query))
											{
												echo"<tr>
														<td>".$rows['date']."</td>
														<td>".$rows['thali']."</td>
														<td>".$rows['qt']."</td>
												</tr>";
											}
										}
										?>
								</tbody>		
								</table>
								</div>
								</div>
 	 </div>
 	 
 	 
 	 
 	 
 	 	<h2>Individual ORDERS</h2>
		<div class="table-responsive">	
				<div class="col-md-12" style="overflow-x: auto">
				<div class =  "table-bordered results">
					 <table  class="table table-condensed table-bordered table-hover" id="mytable">
						 <thead>
                                <tr>
									<th>Date</th>
									<th>Name</th>
									<th>Thali</th>
									<th>Quantity</th>
									<th>Contact</th>
									<th>Ready</th>
								  </tr>
								</thead>
					<tbody>
									  <?php 
									  
										if(isset($_POST['sb']))
										{
												$q=mysql_query("SELECT ot.id, o.order_id, o.date, o.order_till, o.deli_add, o.deli_area, o.deli_city, ot.final_amt, o.is_cancel, ot.thali, ot.qty, t.thali, user.mobile, user.name FROM order_details o JOIN order_thali_details ot ON ot.order_id=o.order_id JOIN users user ON user.id=o.user_id JOIN thali t ON ot.thali=t.id WHERE ot.date='$date' AND `status`='0' AND `type`='$type'  ");

												while($row=mysql_fetch_array($q))
												{
													echo '<tr>'.
																'<td>'.date('d-m-Y',strtotime($row['date'])).'</td>';
																	echo '<td>'.$row['name'].'</td>';
																	echo '<td>'.$row['thali'].'</td>';
																	echo '<td>'.$row['qty'].'</td>';
																	echo '<td>'.$row['mobile'].'</td>';
																	echo '<td>'.'<a href="../data_request_handeller/ready_order.php?id='.$row['id'].'"> <span class="glyphicon glyphicon-ok"></span> </a>'.'</td>'.'</tr>';

												}
										}
										?>
									</tbody>		
                        </table>
						</div>
						</div>
 	 </div>
</body>
</html>
<?php
}
else
{
	header("location:../index.php");
}
?>