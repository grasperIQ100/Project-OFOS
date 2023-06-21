<?php
include("../data_request_handeller/conn.php");

	if(isset($_GET['id']))
	{
		$a = $_GET[id];
		
	} 
$res=mysql_query("delete from loc where id=$a")or die(mysql_error());
header("Location:../admin/set_area.php");
?>