<?php
include "conn.php";
	if(isset($_GET['id']))
	{
		$a = $_GET['id'];
	} 
mysql_query("update feeds SET is_solve=1 where id=$a");
header("Location:../admin/viewmess.php");
?>