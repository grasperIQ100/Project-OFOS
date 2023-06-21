<?php 


$msg=$_POST["mess"];
$id=$_POST["uid"];



include("conn.php");

mysql_query("INSERT INTO `feeds` (`user_id`, `feed`, `is_solve`) VALUES ('$id', '$msg', '0');");

header("location:../review.php");

?>