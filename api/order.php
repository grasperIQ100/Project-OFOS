<?php 
include("conn.php");
function generate_oid() //GENERATES OID
{
		$ma=mysql_query("SELECT MAX(`order_id`) FROM order_details") or mysql_errno();
		$ab=mysql_fetch_array($ma);
		$newoid= $ab['MAX(`order_id`)'] +1;
		return($newoid);
}

 $user=$_REQUEST['id'];
 $client=mysql_query("SELECT id, name FROM users WHERE mail='$user'");
$find_userid=mysql_fetch_array($client);
 $userid= $find_userid["id"]; //userid
 $username= $find_userid["name"]; //userid
 $from=$_REQUEST["from"];//from 
 $to=$_REQUEST["to"]; //if long term order 

 $thalis=explode(',',$_REQUEST["thali"]); //name of thali array
 $qty=explode(',',$_REQUEST["qty"]);
$sche=explode(',',$_REQUEST["type"]);
 $addr=$_REQUEST["addr"]; //ADDRESS
 $city=$_REQUEST["city"]; //name of city
 $area=$_REQUEST["area"]; //name of city
 $coupon=$_REQUEST["coupon"]; //name of coupon no matter if else hai iske liye coupon ke liye 
 
 
 
 //GETS CITY ID
$city1 = mysql_query("select id from city where name='$city'");
$ct=mysql_fetch_array($city1);
$cty=$ct['id'];


//GETS LOCATION BASED ON AREA
$area1=mysql_query("select id from loc where name='$area'");
$ar=mysql_fetch_array($area1);
$are=$ar['id'];


 
 //gets COUPON discount
$disc=mysql_query("select per from offer_cod where code='$coupon' ");
$dis=mysql_fetch_array($disc);
 
 //die;

$finalprice=0;
$thalirate=0;
$gst=18;
$oid=generate_oid();


$res=array();

if($from<date('Y-m-d') OR $to<$from)//backdate validation
{
	echo "Sorry! Please Check your date";
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
					   $t=$sche[$key];//type of thali
					   
					   if($t==2)
					   {
						   for($i=0;$i<2;$i++)
						   {
							    $totalrate=$rate['price']*$qty[$key];
						  		$finalprice=$finalprice+$totalrate;
						  		
						   		mysql_query("INSERT INTO `order_thali_details`(`order_id`, `date`, `thali`, `type`, `qty`, `final_amt`)VALUES ('$oid','$newDate','$selected','$t','$q','$totalrate')");
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
		$gst_amount=0;
		$bill_amt=0;
		$ded=0;
		if($coupon)
		{
    				//discount procedure
            		$ded= $finalprice * $dis["per"]/100; //calculating final price after discount
            		$finalprice= $finalprice-$ded; //discounted rate of thali
            		//gst procedure
    				$gst_amount= $finalprice * $gst/100;
					$bill_amt=$finalprice+$gst_amount;
    				mysql_query("INSERT INTO `order_details`(`user_id`, `date`, `order_id`, `order_till`, `deli_add`, `deli_area`, `deli_city`, `amount`, `dis_avail`, `final_amt`,  `gst`, `bill_amt`,`code`, `is_cancel`) VALUES('$userid', '$from', '$oid', '$to', '$addr', '$are', '$cty', '$amount', '$ded', '$finalprice', '$gst_amount', '$bill_amt','$coupon', '0' )") or mysql_errno();
		}
		else
		{
		            //only gst
			        $gst_amount= $finalprice * $gst/100;
					
					$bill_amt=$finalprice+$gst_amount;
			$query=mysql_query("INSERT INTO `order_details`(`user_id`, `date`, `order_id`, `order_till`, `deli_add`, `deli_area`, `deli_city`, `amount`, `final_amt`,  `gst`, `bill_amt`, `is_cancel`) VALUES('$userid', '$from', '$oid', '$to', '$addr', '$are', '$cty', '$amount', '$finalprice', '$gst_amount', '$bill_amt', '0' )") or mysql_errno();
		}
		if($query)
				{
					$res['message']="Order Placed Successfully";
					$res['orderid']=$oid;
					$res['name']=$username;
					$res['from']=$from;
					$res['to']=$to;
					$res['amount']=$amount;
					$res['gst']=$gst_amount;
					$res['finalprice']=$bill_amt;
					echo json_encode($res);
				}
				else
				{
					$res['message']="Order NOT Placed Successfully";
					echo json_encode($res);
				}
	}
}
exit();
mysql_close($con);
?>
