<?php
include("conn.php");
session_start();
$user=$_SESSION["uid"];
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Meri Kitchen | Home</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../assets/css/main.css">

</head>
<body>
<?php 
function generate_oid()
{
		$ma=mysql_query("SELECT MAX(`order_id`) FROM order_details") or mysql_errno();
		$ab=mysql_fetch_array($ma);
		$newoid= $ab['MAX(`order_id`)'] +1;
		return($newoid);
}
	//getting the user id
$client=mysql_query("SELECT id FROM users WHERE mail='$user' ");
$find_userid=mysql_fetch_array($client);
$userid= $find_userid["id"];
	
	//getting data for orders
$from=$_POST["from"];//from
$to=$_POST["to"]; //if long term order 
$thalis = $_POST['thali']; //gets thali array
$qty=$_POST["qty"];// gets the quantity array
$type=$_POST["type"];// gets the quantity array
$addr= $_POST["addr"]; //address
$area=$_POST["area"];   //name of area
$city=$_POST["city"]; //name of city
$coupon=$_POST["cop"]; //name of coupon 
$gst=18; //gst rate
	
$finalprice=0;
$thalirate=0;
if($coupon!="")
{
   $getcoupon=mysql_query("select code from `order_details` WHERE user_id='".$userid."' and `code`='".$coupon."' ");
    if(mysql_num_rows($getcoupon)>0)
{
        echo"this coupon can only be used once";
        exit();
        //header("location:../view_orders.php");
    }
}
                

	
$oid=generate_oid(); //generates order id
  
	//getting discount terms
$disc=mysql_query("select per from offer_cod where code='$coupon' ");//gets discount
$dis=mysql_fetch_array($disc);

if($from<date('Y-m-d') OR $to<$from)//backdate validation
{
	echo("Sorry! Please Check your date");
}
else
{
	if($to>$from || $to==$from)
	{
	            
				$datetime1 = new DateTime($from); //converts from
				$datetime2 = new DateTime($to); //converts to
				$datetime2 = $datetime2->modify( '+1 day' ); 
				$daterange = new DatePeriod($datetime1, new DateInterval('P1D'), $datetime2);
				$days=0;
				
				foreach($daterange as $date)
				{
					$newDate = $date->format('Y/m/d')."<br>";
    				foreach ($thalis as $key=>$selected) 
				   {


					   $price=mysql_query("select * from thali where id='$selected' "); //gets the price of dish
					   $rate=mysql_fetch_array($price);

					   $q=$qty[$key];// qty of thali
					   $t=$type[$key];//type of thali
					   if($t==2)
					   {
						   for($i=0;$i<2;$i++)
						   {
							    $totalrate=$rate['price']*$qty[$key];
						  		$finalprice=$finalprice+$totalrate;
						   		mysql_query("INSERT INTO `order_thali_details`(`order_id`, `date`, `thali`, `type`, `qty`, `final_amt`)VALUES ('$oid','$newDate','$selected','$i','$q','$totalrate')");
						   }
						   
					   }
					   else
					   {
						   $totalrate=$rate['price']*$qty[$key];
						  $finalprice=$finalprice+$totalrate;
						   mysql_query("INSERT INTO `order_thali_details`(`order_id`, `date`, `thali`, `type`, `qty`, `final_amt`)VALUES ('$oid','$newDate','$selected','$t','$q','$totalrate')");
					   }
				   }
					 $days++;
					
				}//adding price according to days
				
               
    				$amount=$finalprice;
    				//discount procedure
            		$ded= $finalprice * $dis["per"]/100; //calculating final price after discount
            		$finalprice= $finalprice-$ded; //discounted rate of thali
    				$gst_amount= $finalprice * $gst/100;
					echo $gst_amount;
		
					$bill_amt=$finalprice+$gst_amount;
    				mysql_query("INSERT INTO `order_details`(`user_id`, `date`, `order_id`, `order_till`, `deli_add`, `deli_area`, `deli_city`, `amount`, `dis_avail`, `final_amt`,  `gst`, `bill_amt`,`code`, `is_cancel`) VALUES('$userid', '$from', '$oid', '$to', '$addr', '$area', '$city', '$amount', '$ded', '$finalprice', '$gst_amount', '$bill_amt','$coupon', '0' )") or mysql_errno();
	}
}
       				?>
<div class="row" style="margin-top: 10%;">
	<div class="col-xs-2 col-md-4"></div>
	<div class="col-xs-8 col-md-4" style="text-align: center;">
		<h1>Grab Your Spoons. Your Food is on Its way.</h1>
		<iframe src="https://giphy.com/embed/wa33hRXxoPuDe" width="300px" height="300px;" frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
		<p><a href="https://giphy.com/gifs/cooking-wa33hRXxoPuDe"></a></p>
		<a href="../view_orders.php">Go Back</a>
	</div>
</div>
</body>
</html>