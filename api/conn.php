<?php 
define('HOST','localhost:3306');
define('USER','statskin');
define('PASS','abc@123');
define('DB','statskin_meri');
 
$con = mysql_connect(HOST,USER,PASS);
mysql_select_db(DB);
?>