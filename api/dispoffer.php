<?php 

include("conn.php");

$query=mysql_query("SELECT * FROM `disp_offer` WHERE `is_active`='0'  ");

$response=array();

if(mysql_num_rows($query)>0)
{
	while($row=mysql_fetch_array($query))
	{
		array_push($response,array('des'=>$row['des']));
	}
	echo json_encode(array("result"=>$response));
}
else
{
	echo "Record Not Found Try Again";
}
mysql_close($con);
?>