<?php
include("conn.php");
$name=$_REQUEST['userid'];
 
$sql = "select * from users where mail='$name'";
 
$res = mysql_query($sql);
 
$result = array();
 
while($row = mysql_fetch_array($res))
{
	array_push($result,array('name'=>$row['name'],'pass'=>$row['pass'],'mobile'=>$row['mobile']));
}
 
echo json_encode(array("result"=>$result));
 
mysql_close($con);
 
?>