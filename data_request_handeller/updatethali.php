<?php

include("../data_request_handeller/conn.php");
$epr='';
				$msg='';
				if(isset($_GET['epr']))
					$epr=$_GET['epr'];
				
if(isset($_POST['thalisubmit']))
{	//print_r($_POST);
	$id=$_POST['id'];
	$name=$_POST['tname'];
	$price=$_POST['tprice'];
	$res=mysql_query("UPDATE `thali` SET `thali`='$name',`price`='$price' WHERE  `id`='$id' ")or die(mysql_error());
}
header("Location:../admin/setthali.php");

?>