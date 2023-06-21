<?php

$deliver=$_GET["id"];

include("conn.php");

mysql_query("UPDATE `order_thali_details` SET `status`='3' WHERE `id`='$deliver' ");

header("location:../mess/main.php");

?>