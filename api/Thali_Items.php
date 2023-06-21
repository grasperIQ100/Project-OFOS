 <?php
include("conn.php"); 
$thali_price=$_REQUEST['thali'];
$thali=explode(" ",$thali_price);
$thali_it=$thali[0];


$date=$_REQUEST['date'];
$id=mysql_query("select * from thali where thali='$thali_it'");
$row=mysql_fetch_array($id);
$tid=$row['id'];
$sql = "select * from menu where reg='$tid' and menu_date='$date'";
 
$res = mysql_query($sql);
 
$result = array();
 
while($row = mysql_fetch_array($res))
{
	array_push($result,array('name'=>$row['name'],'type'=>$row['type'],'qty'=>$row['qty'],'ingre'=>$row['ingre']));
}
 
echo json_encode(array("result"=>$result));
 
mysql_close($con);
 
?>