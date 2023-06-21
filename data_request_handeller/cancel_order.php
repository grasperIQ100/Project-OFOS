<?php 
session_start();
if(isset($_SESSION['uid']))
{

$user=$_SESSION['uid'];

$oid= $_GET["id"];
include("conn.php");
 date_default_timezone_set("Asia/Kolkata");
$d=date('Y-m-d'); //takes the current date
$date = new DateTime($d);


$famt=mysql_query("SELECT * FROM `order_details` WHERE `order_id` ='$oid' and `is_cancel`='0' ");
$amount_to_be_added=mysql_fetch_array($famt);

$date1= new DateTime($amount_to_be_added['date']); //date of order placed
$date2= new DateTime($amount_to_be_added['order_till']); // date till where order is placed
$diff=date_diff($date1, $date2); // counts no. of days of order
$difd= $diff->format("%R%a days");
if($difd>=+14) //if order is of one month
{
	$diff_days=date_diff($date1,$date); //diff between order placed and todays date
	$ded_amount_days=0;
	$ded_amount_days= $diff_days->format("%R%a days");
	if($ded_amount_days<=5)
	{
	    $refund_days=$ded_amount_days+5; // adding +5 days
	    //$per_day_amt=$amount_to_be_added['final_amt']/$difd; //diviion of price
	    //$amt=$per_day_amt*$refund_days;// amount paid
	    //$amts=$amount_to_be_added['final_amt']-$amt; //amount to be refunded
		$refunds=date('Y-m-d', strtotime($d. ' + 5 days'));
	    mysql_query("UPDATE `order_thali_details` SET `status`='2' WHERE `date` >= '$d' AND `order_id`= '$oid' ");
		$getamt=mysql_query("SELECT SUM(final_amt) AS refund FROM `order_thali_details` WHERE `date` >= '$refunds' AND `order_id`= '$oid' ");
		$storeamt=mysql_fetch_array($getamt);
	    mysql_query("UPDATE `users` SET `wallet_bal`=`wallet_bal`+'".$storeamt['refund']."' WHERE `mail`='$user' ");
	    mysql_query("UPDATE `order_details` SET `is_cancel`=1, `cancel_on`='$d',`final_amt`=`final_amt`-'".$storeamt['refund']."' WHERE `order_id`='$oid' ") or mysql_errno();
	    header("location:../view_orders.php");
	}
}
else
{
	//$amt=$amount_to_be_added['amount']; Refund process will not be initiated if it is a single day order
	mysql_query("UPDATE `order_thali_details` SET `status`='2' WHERE `date` >= '$d' AND `order_id`= '$oid' ");
	mysql_query("UPDATE `order_details` SET `is_cancel`=1, `cancel_on`='$d' WHERE `order_id`='$oid' ") or mysql_errno();
	header("location:../view_orders.php");
}

?>
<?php
}
else
{
	header("location:../index.php");
}
?>