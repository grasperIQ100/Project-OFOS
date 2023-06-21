<?php 

include("conn.php");
$user=$_REQUEST['id'];

 date_default_timezone_set("Asia/Kolkata");
$d=date('Y-m-d'); //takes the current date

$client=mysql_query("select id from users where mail='$user'");
$find_userid=mysql_fetch_array($client);
$userid=$find_userid["id"]; //userid


$query=mysql_query("select order_id, date, order_till, dis_avail,final_amt from order_details WHERE `user_id`='$userid' AND `date`>='$d' AND `order_till`!=`date` AND `is_cancel`='0' ");
//$q=mysql_query("SELECT order_details.id, order_details.date, order_details.amount, thali.thali FROM order_details INNER JOIN thali ON order_details.thali=thali.id WHERE order_details.date='$date' and order_details.order_till LIKE '0000-00-00' and order_details.is_cancel='0' ");
$response=array();

if(mysql_num_rows($query)>0)
{
	while($row=mysql_fetch_array($query))
	{
		array_push($response,array('id'=>$row['order_id'],'date'=>$row['date'],'order_till'=>$row['order_till'],'thali_price'=>$row['amount'],'dis_avail'=>$row['dis_avail'],'final_amt'=>$row['final_amt']));
	}
	echo json_encode(array("result"=>$response));
}
else
{
	echo "Record Not Found Try Again Sometime...";
}
mysql_close($con);
?>