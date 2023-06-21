<?php

    include "data_request_handeller/conn.php";

	$id=$_GET["tid"];
	$currentDate = new DateTime();
	$dt = $currentDate->format('Y-m-d');
	$query1=mysql_query("SELECT * FROM menu,thali WHERE thali.id=menu.reg and menu.reg='".$id."' and menu.menu_date='".$dt."'");
		
		while($row=mysql_fetch_assoc($query1))
    	{
    		$data[]=$row;
    	}
    	print json_encode($data);
	


//	print_r($query1);die;

/*	---------------------------------------
	include "data_request_handeller/conn.php";
	$query="SELECT * FROM thali";

	$rs=mysql_query($query);
	while($row=mysql_fetch_assoc($rs))
	{
		$data[]=$row;
	}
	print json_encode($data);*/
?>