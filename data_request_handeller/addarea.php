<?php 
include("../data_request_handeller/conn.php");
	    		$epr='';
				$msg='';
				if(isset($_GET['epr']))
					$epr=$_GET['epr'];
				
if(isset($_POST['areasubmit']))
{	//print_r($_POST);
	
	
	$tname = $_POST['aname'];
	$a_sql=mysql_query("INSERT INTO loc(name,city) VALUES ('$tname',2)");
		
		if($a_sql)
			header("location: ../admin/set_area.php");
		else
			$msg='error: '.mysql_error();	
}

?>