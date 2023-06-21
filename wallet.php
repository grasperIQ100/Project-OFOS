<?php include("frames/userheader.php"); include("data_request_handeller/conn.php"); ?>
<html>
<head>
<meta charset="utf-8">
<title>Wallet</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <link rel = "stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
 <script>
$(document).ready(function(){
    $('#mytable').dataTable();
});
</script> 

</head>

<body>
<?php $id=mysql_query("select id, wallet_bal from users where mail='".$_SESSION["uid"]."' ");
	$userid=mysql_fetch_array($id); 
	$od=mysql_query("select * from order_details where user_id='".$userid["id"]."' and is_cancel='1' ");
?>
<div class="row">
	<div class="col-xs-6 col-md-7"></div>
	<div class="col-xs-5 col-md 3">
		<h2>Wallet Balance:<?php echo $userid["wallet_bal"]; ?></h2>
	</div>
</div>

		
 <div class="row" >
 <div class="col-xs-1 col-md-2"></div>
 	<form  method="POST" >
	 <div class="table-responsive">	
		<div class="col-md-8" style="overflow-x: auto"/>
				<table  class="table" id="mytable">
					<thead>
						<tr>
							<th>Date</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
					<?php
						while($row=mysql_fetch_array($od))
						{
							echo"<tr>
							<td>".$row['date']."</td>
							<td>".$row['amount']."</td>
						</tr>";
						}
					?>
					</tbody>
                 </table>
				</div>
			</div>
		</form>	
</div>
</body>
<?php include("frames/userfooter.php") ?>

</html>