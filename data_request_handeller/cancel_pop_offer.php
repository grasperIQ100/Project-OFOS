<?php

include("conn.php");

$offer=$_GET["id"];

mysql_query("UPDATE `disp_offer` SET `is_active`='1' WHERE `id`='$offer' ") or mysql_errno();

header("location:../admin/popoff.php");

?>