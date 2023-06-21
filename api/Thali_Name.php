<?php
include("conn.php"); 
$sql = "select * from thali where is_deleted='0'";
 
$res = mysql_query($sql);
 
$result = array();
 
while($row = mysql_fetch_array($res))
{
	array_push($result,array('id'=>$row['id'],'thali'=>$row['thali'],'price'=>$row['price']));
}
 
echo json_encode(array("result"=>$result));
 
mysql_close($con);
 
?>