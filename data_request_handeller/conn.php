<?php 
$con=mysql_connect("localhost","root","") or mysql_errno();
mysql_select_db("meri_kitchen1",$con) or mysql_error();

//$con=mysql_connect("localhost:3306","statskin","abc@123") or mysql_errno();
//mysql_select_db("statskin_meri",$con) or mysql_error();
?>