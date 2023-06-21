<?php 

include("conn.php");
$user=$_REQUEST['id'];
date_default_timezone_set("Asia/Kolkata");
$date =  date('Y-m-d');

$client=mysql_query("select id from users where mail='$user'");
$find_userid=mysql_fetch_array($client);
$userid=$find_userid["id"];

//'qty'=>$row['qty'],'amount'=>$row['OTFM'],
$query=mysql_query("SELECT o.order_id, o.date, o.order_till, o.dis_avail, o.final_amt, o.code, o.is_cancel, ot.qty, ot.thali, ot.final_amt AS OTFM, ot.qty, t.thali FROM order_details o JOIN order_thali_details ot ON ot.order_id=o.order_id JOIN thali t ON ot.thali=t.id WHERE o.user_id ='$userid'
");



$response=array();


	while($row=mysql_fetch_array($query))
	{
		array_push($response,array('id'=>$row['order_id'],'date'=>$row['date'],'thali'=>$row['thali'], 'order_till'=>$row['order_till'] , 'thali_price'=>$row['OTFM'],'dis_avail'=>$row['dis_avail'],'final_amt'=>$row['final_amt']));
	}
	echo json_encode(array("result"=>$response));


mysql_close($con);
?>