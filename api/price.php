<?php
include("conn.php"); 
$thali=$_REQUEST['thali'];
$prices=mysql_query("select price from thali where thali='$thali'");
$row=mysql_fetch_array($prices);
$price=$row['price'];

echo $price; 
mysql_close($con);
 
?>