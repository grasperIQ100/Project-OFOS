<?php
date_default_timezone_set("Asia/Kolkata");
$date =  date('Y-m-d');
$dday= date('l');
$day = strtolower($dday);
include("conn.php");
$dqueryg=mysql_query("SELECT * FROM `menu` INNER JOIN thali ON menu.reg=thali.id where menu_date='$date' group by menu.reg ") or mysql_errno();
//$dqueryp=mysql_query("SELECT * FROM `menu` INNER JOIN thali ON menu.reg=thali.id where menu_date='$date' AND menu.reg='2' ") or mysql_errno();
//$dquerym=mysql_query("SELECT * FROM `menu` INNER JOIN thali ON menu.reg=thali.id where menu_date='$date' AND menu.reg='3' ") or mysql_errno();
//$dqueryr=mysql_query("SELECT * FROM `menu` INNER JOIN thali ON menu.reg=thali.id where menu_date='$date' AND menu.reg='4' ") or mysql_errno();
?>