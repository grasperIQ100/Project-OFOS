<?php
include("conn.php"); 
$sql = "select * from city";
 
$res = mysql_query($sql);
 
$result = array();
 
while($row = mysql_fetch_array($res))
{
	array_push($result,array('city'=>$row['name']));
}
 
echo json_encode(array("result"=>$result));
 
mysql_close($con);
 
?>