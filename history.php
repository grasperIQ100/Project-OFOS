<?php
session_start();
if(isset($_SESSION['uid']))
{
include("data_request_handeller/conn.php");
include("frames/userheader.php"); 
$getuser=mysql_query("select id from users where mail='".$_SESSION['uid']."' ");
$getid=mysql_fetch_array($getuser);
	$uid=$getid['id'];
?>
<html>
<head>
<meta charset="utf-8">
<title>Orders</title>

 <script type="text/javascript">

	 $(document).ready(function(){
    $('#mytable1').dataTable();
});
</script> 

 </head>

<body>
<div class="row">
	<div class="col-xs-12 col-md-12">
		<h2>Previous Orders</h2>
		<div class="table-responsive">	
						<div class="col-md-12" style="overflow-x: auto">
							<div class =  "table-bordered results">
								 <table  class="table table-condensed table-bordered table-hover" id="mytable1">
									<thead>
									  <tr>
									   <th>Order ID</th>
										<th>Date</th>
										<th>Order As On</th>
										<th>Contact</th>
										<th>Amount</th>
										<th>Status</th>
									  </tr>
									</thead>
									<tbody>
									  <?php 
									  date_default_timezone_set("Asia/Kolkata");
										$date =  date('Y-m-d');
										
										$q=mysql_query("SELECT * FROM order_details WHERE `user_id`='$uid' ");
										while($row=mysql_fetch_array($q))
										{
											echo"<tr>
												<td>".$row['order_id']."</td>
												<td>".date('d-m-Y',strtotime($row['date']))."</td>
												<td>".date('d-m-Y',strtotime($row['order_till']))."</td>
												<td>".$row['mobile']."</td>
												<td>".$row['final_amt']."</td>
												<td>".$row['is_cancel']."</td>
											</tr>";
										}
										?>
									</tbody>
			  					</table>
			  			</div>
				</div>
		  </div>
	  </div>
  </div>
  </body>
<?php include("frames/adminfooter.php"); ?>
</html>
<?php
}
else
{
	header("location:index.php");
}
?>