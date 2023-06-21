<?php 
include("../data_request_handeller/conn.php");
	    		$epr='';
				$msg='';
				if(isset($_GET['epr']))
					$epr=$_GET['epr'];
				
if(isset($_POST['thalisubmit']))
{	//print_r($_POST);
	
	
	$tname = $_POST['tname'];
	$tprice = $_POST['tprice'];
	$a_sql=mysql_query("INSERT INTO thali(thali,price) VALUES ('$tname',$tprice)");
		
		if($a_sql)
			header("location: ../admin/setthali.php");
		else
			$msg='error: '.mysql_error();	
}

				
if(isset($_POST['thaliupdate']))
{	//print_r($_POST);
	
	
	$tname = $_POST['tname'];
	$tprice = $_POST['tprice'];
	$id = $_POST['id'];
	$a_sql=mysql_query("update thali set thali='$tname',price=$tprice where id=$id");
		
		if($a_sql)
			header("location: ../admin/adminindex.php");
		else
			$msg='error: '.mysql_error();	
}

?>