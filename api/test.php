<?php 
include("conn.php");
/*$get=$_REQUEST['get'];
echo $get;
$jsonObject=json_decode($get,true);
echo "het".$jsonObject;
*/



$data = array(
    'cols' => array(
        array('id' => '', 'label' => 'Content', 'pattern' => '', 'type' => 'string'),
        array('id' => '', 'label' => 'Slices', 'pattern' => '', 'type' => 'number')     
    ),
    'rows' => array(
        array('c' => array(
            array('v' => 'Books'),
            array('v' => 3)         
        )), 
        array('c' => array(
            array('v' => 'Video'),
            array('v' => 1)         
        )),     
        array('c' => array(
            array('v' => 'Audio'),
            array('v' => 1)         
        )),     
        array('c' => array(
            array('v' => 'Movie'),
            array('v' => 1)         
        ))      
    )   
);  

$en=json_encode($data);

$res=json_decode($en,true);
var_dump($res);


echo $res['cols']['id'];


/*$client=mysql_query("SELECT id FROM users WHERE mail='$user'");
$find_userid=mysql_fetch_array($client);


$userid= $find_userid["id"]; //userid
$from=$_REQUEST["from"];//from
$to=$_REQUEST["to"]; //if long term order 
$dish=$_REQUEST["thali"]; //name of dish
$city=$_REQUEST["city"]; //name of city
$area=$_REQUEST["area"]; //name of city
$address=$_REQUEST["address"]; //name of city
$coupon=$_REQUEST["coupon"]; //name of coupon
$city1 = mysql_query("select id from city where name='$city'");
$ct=mysql_fetch_array($city1);
$cty=$ct['id'];

$area1=mysql_query("select id from loc where name='$area'");
$ar=mysql_fetch_array($area1);
$are=$ar['id'];
$price=mysql_query("select * from thali where thali='$dish' "); //gets the price of dish
$disc=mysql_query("select per from offer_cod where code='$coupon' ");//gets discount

$rate=mysql_fetch_array($price);
$dis=mysql_fetch_array($disc);

$res=array();

if($from<date('Y-m-d') OR $to<$from)//backdate validation
{
	echo "Sorry! Please Check your date";
}

else
{
	if($to)
	{
				$datetime1 = new DateTime($from);
				$datetime2 = new DateTime($to);
				$daterange = new DatePeriod($datetime1, new DateInterval('P1D'), $datetime2);
				$thalirate=$rate['price'];
				foreach($daterange as $date)
				{
    					$thalirate+=$rate['price'];
				}//adding price according to days
		$ded= $thalirate * $dis["per"]/100; //calculating final price after discount
		$finalprice= $thalirate-$ded; //discounted rate of thali
		$query=mysql_query("INSERT INTO `order_details`(`user_id`, `date`, `thali`, `order_till`, `deli_city`,`deli_area`,`deli_add`, `thali_price`, `amount`, `dis_avail`, `final_amt`, `code`, `is_cancel`) VALUES('$userid', '$from', '".$rate['id']."', '$to', '$cty','$are','$address', '".$rate['price']."', '$thalirate', '$ded', '$finalprice', '$coupon', '0' )") or mysql_errno();
		if($query)
        {
            $res['message']="Order Placed Successfully";
            echo json_encode($res);
        }
        else
        {
            $res['message']="Order Not Placed Successfully";
            echo json_encode($res);
        }

	}
	else
	{
		$thalirate=$rate['price']; //actual rate of thali
		$ded=0;
		if($coupon)
		{
			$ded= $thalirate * $dis["per"]/100; //calculating final price after discount
		}
		$finalprice= $thalirate-$ded; //discounted rate of thali
		$query=mysql_query("INSERT INTO `order_details`(`user_id`, `date`, `thali`, `order_till`, `deli_city`,`deli_area`,`deli_add`, `thali_price`, `amount`, `dis_avail`, `final_amt`, `code`, `is_cancel`) VALUES('$userid', '$from', '".$rate['id']."', '$from', '$cty','$are','$address', '".$rate['price']."', '$thalirate', '$ded', '$finalprice', '$coupon', '0' )") or mysql_errno();
		if($query)
        {
            $res['message']="Order Placed Successfully";
            echo json_encode($res);
        }
        else
        {
            $res['message']="Order Not Placed Successfully";
            echo json_encode($res);
        }

	}
}
exit();

mysql_close($con);*/
?>
