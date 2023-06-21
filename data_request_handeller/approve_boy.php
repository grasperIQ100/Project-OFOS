<?php

$deliver=$_GET["id"];

include("conn.php");

mysql_query("UPDATE `delivery_staff` SET `status`='1' WHERE `id`='$deliver' ");

header("location:../admin/delivery.php");

?>