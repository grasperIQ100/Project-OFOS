<?php 

include("conn.php");
$user=$_REQUEST['id'];

 date_default_timezone_set("Asia/Kolkata");
$d=date('Y-m-d'); //takes the current date

$client=mysql_query("select id from delivery_staff where mail='$user'");
$find_userid=mysql_fetch_array($client);
$userid=$find_userid["id"]; //userid


$findarea=mysql_query("select location from delivery_schedule where date='$d' and staff_id='$userid'");
$farea=mysql_fetch_array($findarea);
$ffarea=$farea['location'];



$query=mysql_query("SELECT ot.id, o.order_id, o.deli_add, o.deli_area, o.deli_city, ot.final_amt, o.is_cancel,ot.qty, t.thali, user.mobile, user.name FROM order_details o JOIN order_thali_details ot ON ot.order_id=o.order_id JOIN users user ON user.id=o.user_id JOIN thali t ON ot.thali=t.id WHERE '$d' = ot.date AND deli_area='$ffarea' AND `status`='0' OR `status`='3'");
//$q=mysql_query("SELECT order_details.id, order_details.date, order_details.amount, thali.thali FROM order_details INNER JOIN thali ON order_details.thali=thali.id WHERE order_details.date='$date' and order_details.order_till LIKE '0000-00-00' and order_details.is_cancel='0' ");
$response=array();

if(mysql_num_rows($query)>0)
{
	while($row=mysql_fetch_array($query))
	{
		array_push($response,array('id'=>$row['order_id'],'deli_add'=>$row['deli_add'],'qty'=>$row['qty'],'thali'=>$row['thali'],'name'=>$row['name'],'mobile'=>$row['mobile'],'final_amt'=>$row['final_amt'],'final_amt'=>$row['final_amt']));
	}
	echo json_encode(array("result"=>$response));
}
else
{
	echo "Record Not Found Try Again Sometime...";
}
mysql_close($con);
?>