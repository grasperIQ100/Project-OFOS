<?php
include("../data_request_handeller/conn.php");

	if(isset($_GET['id']))
	{
		$a = $_GET[id];
		
	} 
$res=mysql_query("update thali set is_deleted=1 where id=$a")or die(mysql_error());
header("Location:../admin/setthali.php");
?>