<?php 

$offnm=$_POST["offnm"];
$offds=$_POST["offds"];
$des=$_POST["desc"];

include("conn.php");
mysql_query("INSERT INTO `offer_cod`(`code`, `per`, `disc`, `is_active`) VALUES ('$offnm','$offds','$des','0')") or mysql_errno();
header("location:../admin/set_offer.php");
?>