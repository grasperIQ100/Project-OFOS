<?php
session_start();
include("data_request_handeller/conn.php");
if(isset($_SESSION['uid']))
{
	?>
<?php include("frames/userheader.php");
	include("data_request_handeller/conn.php");
	?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Orders</title>
<link rel="stylesheet" type="text/css" href="./assets/css/lightbox.css" />
 <link rel = "stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$('document').ready(function(e){
		$('input.thali').change(function(){
        if ($(this).is(':checked')) $(this).next().after("<label class='lbl'>Quantity:</label><input type='text' class='qty' name='qty[]' placeholder='Enter quantity' /> <select class='type' name='type[]'><option value='0'>Lunch</option><option value='1'>Dinner</option><option value='2'>Both</option></select><br>");
        else 
			{
			$('.lbl').remove(); 
			$('input.qty').remove(); 
			$('.type').remove();
			}
		}).change();
	});
	$(document).ready(function(){
    $('#mytable1').dataTable();
});
	if(!!window.performance && window.performance.navigation.type == 2)
{
    window.location.reload();
}
$(function() {
    $('input[name=pin]').on('keyup', function() {
    selectByText($.trim($(this).val()));
});
});

function selectByText(txt) {
    $('#area option')
        .filter(function() { 
            return $.trim($(this).text().substring(0,6)) == txt; 
        })
        .attr('selected', true);
}
</script>
</head>



<body>
<div class="row">
<div class="col-md-1" ></div>
	<div class="col-xs-12 col-md-5" style="background-color: rgba(0,0,0,0.30); padding-bottom: 6%; border-radius: 5%;">
		<h2>New Order</h2>
		<form style="margin-left: 5%;" action="data_request_handeller/send_order.php"  method="post">
			From:<input type="date" class="form-control" name="from" style="width: 35%;"  required><br>
			To:<input type="date" class="form-control" name="to" style="width: 35%;"  value="<?php echo date("Y-m-d");?>"><br>
			Thali:<br>
				<?php
				$op=mysql_query("select * from thali where is_deleted=0");
				
				while($r=mysql_fetch_array($op))
				{
					echo("<input type='checkbox' name='thali[ ]' class='thali' value='".$r['id']."'/>".$r['thali']." Rs.".$r['price']."<br>");
					//echo("<input type='text' class='qty' name='qty[]' /><br>");
					
				}
				?>
			<br>
			City:
			<select class="form-control" style="width: 45%;" name="city">
				<?php
				$op=mysql_query("SELECT * from city");
				while($c=mysql_fetch_array($op))
				{
					echo("<option value='".$c['id']."'>".$c['name']." </option>");
				}
				?>

			</select><br>
			
			Pincode:<input type="text" class="form-control" id='field' style="width: 45%;" name="pin" /></br>

			Area:
			<select class="form-control" style="width: 45%;" id='area' name="area" >
			<?php 
				$l = mysql_query("select * from loc ");
				while($ll = mysql_fetch_array($l))

				{  
					echo("<option value='".$ll['id']."'>".$ll['pin']." ".$ll['name']." </option>");
					    


				} ?>

			</select><br>
            	Address:<textarea class="form-control" style="width: 45%;" name="addr" required></textarea>
		
			

			Coupon:<input type="text" class="form-control" style="width: 45%;" name="cop" />

			<br>

			<button type="submit" class="col-xs-5 col-md-3" style=" background-color: bisque; border: none; margin-left: 10%;"><b>ORDER</b></button>
			<button type="reset" class="col-xs-5 col-md-3" style=" background-color: bisque; border: none; margin-left: 10%;"><b>RESET</b></button>
		</form>

	</div>
	<div class="col-xs-12 col-md-6" >
		<h2>Previous Orders</h2>
            <div class="table-responsive">	
				<div class="col-md-12" style="overflow-x: auto">
				<div class =  "table-bordered results">
					 <table  class="table table-condensed table-bordered table-hover" id="mytable1">
    					<thead>

                         	<tr>
                         		<th><b><center>Order ID</center></b></th>

								<th><b> <center>Order On</center></b></th>

								<th><b><center>Order Till </center></b></th>

								<th><b><center> Total</center></b></th>

								<th><b><center> Discount</center></b></th>

								<th><b><center> Coupon</center></b></th>

								<th><b><center> Paid</center></b></th>
								
								<th><b><center> Cancel</center></b></th>

							</tr>

                         </thead>

								<?php 
								date_default_timezone_set("Asia/Kolkata");
								$date =  date('Y-m-d');

								$a= $_SESSION['uid'];//gets name of user

								$vo=mysql_query("SELECT `id` FROM `users` WHERE `mail`='$a' ") or mysql_errno();//finds the id of user

								$arr=mysql_fetch_array($vo);//gets the id

								$id= $arr["id"];

								$catchod=mysql_query("SELECT `order_id`, `date`, `order_till`,  `dis_avail`, `amount`, `final_amt`,  `code`, `is_cancel` FROM `order_details` WHERE `user_id` ='$id' and `is_cancel`='0' and '$date' BETWEEN date and order_till ") or mysql_errno();//gets all the orders of user id
                                

												 ?>

						  <tbody>

								<?php //href='data_request_handeller/cancel_order.php?id=".$orders['id']." '

								while($orders=mysql_fetch_array($catchod))

								{
								    
									echo"<tr>
										<td>".$orders['order_id']."</td>

										<td>".$orders['date']."</td>

										<td>".$orders['order_till']."</td>

										<td>".$orders['amount']."</td>

										<td>".$orders['dis_avail']."</td>

										<td>".$orders['code']."</td>

										<td>".$orders['final_amt']."</td>";
									
										if( $orders['date']!=$orders['order_till'] and $orders['is_cancel']=='0' )

										{
									        echo '<td>'.'<a href="data_request_handeller/cancel_order.php?id='.$orders['order_id'].'"onclick="return confirm(\'Are you sure you want to cancel this order?\');"> <span class="glyphicon glyphicon-trash"></span>  </a>'.'</td>'.'</tr>';
											
										}
										elseif($orders['date']==$orders['order_till'])
									    {
										//echo'<td>'.'<a href="data_request_handeller/cancel_order.php?id='.$orders['order_id'].' " class="btn btn-info" onclick="return confirm('This order will be cancelled but refund will not be initiated. Do you still want to continue?');"><span class='glyphicon glyphicon-remove' ></span></a></td>';
									    
									        echo '<td>'.'<a href="data_request_handeller/cancel_order.php?id='.$orders['order_id'].'"onclick="return confirm(\'Cancelling single order will not initiate refund. Do you still want to proceed?\');"> <span class="glyphicon glyphicon-trash"></span>  </a>'.'</td>'.'</tr>';
									    }
									
									else
									{
										echo"<td>Delivered</td>";
									}
									
								}
							  // $orders['date']!=$orders['order_till'] and (condition if cacel button not to be showed on single order)
								?>

						 </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("frames/userfooter.php") ?>
</body>
</html>
<?php
}
else
{
	header("location:index.php");
}
?>