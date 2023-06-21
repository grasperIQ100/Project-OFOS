<?php
include("conn.php");
$offer=$_GET["id"];
mysql_query("UPDATE `offer_cod` SET `is_active`='1' WHERE `code`='$offer' ") or mysql_errno();
header("location:../admin/set_offer.php");
?>