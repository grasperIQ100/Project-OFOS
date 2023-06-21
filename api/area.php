<?php
include("conn.php"); 
$city=$_REQUEST['city'];
//$city1=(int)$city+1;

$id=mysql_query("select id from city where name='$city'");
$row=mysql_fetch_array($id);
$tid=$row['id'];
$sql = "select name from loc where city='$tid'";
 
$res = mysql_query($sql);
 
$result = array();
 
while($row = mysql_fetch_array($res))
{
	array_push($result,array('area'=>$row['name']));
}
 
echo json_encode(array("result"=>$result));
 
mysql_close($con);
 
?>