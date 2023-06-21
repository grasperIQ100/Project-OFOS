<?php
session_start();
if(isset($_SESSION['aid']))
{
include("../frames/adminheader.php"); ?>
<html>
<head>
<meta charset="utf-8">
<title>Orders</title>

 <script type="text/javascript">
$(document).ready(function(){
    $('#mytable').dataTable();
});
	 $(document).ready(function(){
    $('#mytable1').dataTable();
});
</script> 

 </head>

<body>
<div class="col-xs-12 col-md-12">
<h2>DAILY ORDERS</h2>
<div class="table-responsive">	
				<div class="col-md-12" style="overflow-x: auto">
				<div class =  "table-bordered results">
					 <table  class="table table-condensed table-bordered table-hover" id="mytable1">
						<thead>
						  <tr>
						   <th>Order ID</th>
							<th>Date</th>
							<th>Name</th>
							<th>Thali</th>
							<th>Quantity</th>
							<th>Address</th>
							<th>Contact</th>
							<th>Amount</th>
							<th>Delevered</th>
						  </tr>
						</thead>
						<tbody>
						  <?php 
						  date_default_timezone_set("Asia/Kolkata");
							$date =  date('Y-m-d');
							include("../data_request_handeller/conn.php");
							$q=mysql_query(" SELECT ot.id, o.order_id, o.date, o.order_till, o.deli_add, o.deli_area, o.deli_city, ot.final_amt, o.is_cancel, ot.thali, ot.qty, t.thali, user.mobile, user.name FROM order_details o JOIN order_thali_details ot ON ot.order_id=o.order_id JOIN users user ON user.id=o.user_id JOIN thali t ON ot.thali=t.id WHERE '$date' = ot.date AND `status`='0' OR `status`='3'  ");
							while($row=mysql_fetch_array($q))
							{
								echo"<tr>
									<td>".$row['order_id']."</td>
									<td>".date('d-m-Y',strtotime($row['date']))."</td>

									<td>".$row['name']."</td>
									<td>".$row['thali']."</td>
									<td>".$row['qty']."</td>
									<td>".$row['deli_add']."</td>
									<td>".$row['mobile']."</td>
									<td>".$row['final_amt']."</td>
									<td><a href='../data_request_handeller/deliver_order.php?id=".$row['id']."&amp;oid=".$row['order_id']."'>
							  <span class='glyphicon glyphicon-ok'></span>
							</a></td>
								</tr>";
							}
							?>
						</tbody>
  </table></div></div></div>
  </div>
  <div class="row" ><div class="col-xs-12 col-md-12" style="background-color: brown; height: 20px;" ></div></div>
  <div class="col-xs-12 col-md-12" >
  	<h2>LONG TERM ORDERS</h2>
  	<div class="table-responsive">	
				<div class="col-md-12" style="overflow-x: auto">
				<div class =  "table-bordered results">
					 <table  class="table table-condensed table-bordered table-hover" id="mytable">
    <thead>
      <tr>
        <th>From</th>
        <th>Name</th>
        <th>To</th>
        <th>Address</th>
        <th>Contact</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
    <?php 
		$date =  date('Y-m-d');
		include("../data_request_handeller/conn.php");
		$q=mysql_query(" SELECT o.order_id, o.date, o.order_till, o.deli_add, o.final_amt, o.is_cancel, user.mobile, user.name, l.name AS LOCA, c.name AS CIT FROM order_details o JOIN users user ON user.id=o.user_id JOIN loc l ON o.deli_area=l.id JOIN city c ON o.deli_city=c.id WHERE '$date' BETWEEN o.date AND o.order_till AND o.date!=o.order_till and o.is_cancel='0'");
		while($row=mysql_fetch_array($q))
		{
		
			echo"<tr> 
			    <td>".date('d-m-Y',strtotime($row['date']))."</td>
				<td>".$row['name']."</td>
			    <td>".date('d-m-Y',strtotime($row['order_till']))."</td>
				<td>".$row['deli_add'].",".$row['LOCA'].",".$row['CIT']."</td>
				<td>".$row['mobile']."</td>
				<td>".$row['final_amt']."</td>
			</tr>";
		}
		?>
    </tbody>
					</table></div></div></div>
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