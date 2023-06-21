<?php

$deliver=$_GET["id"];
$orid=$_GET["oid"];

include("conn.php");

mysql_query("UPDATE `order_thali_details` SET `status`='1' WHERE `id`='$deliver'");
$get=mysql_query("SELECT * from order_details WHERE `order_id`='$orid' ");
$getorder=mysql_fetch_array($get);
if($getorder["date"]==$getorder["order_till"])
{
mysql_query("UPDATE `order_details` SET `is_cancel`='2' WHERE `order_id`='$orid' ");
}
header("location:../admin/adminindex.php");

?>