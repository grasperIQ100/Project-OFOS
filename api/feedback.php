<?php
include("conn.php");

$nm=$_REQUEST["username"];
$feed=$_REQUEST["message"];

$id=mysql_query("select id from users where mail='$nm'");
$user=mysql_fetch_array($id);
$userid=$user['id'];
echo $feed;
echo $nm;
echo $userid;


$row=mysql_query("INSERT INTO `feeds`(`user_id`, `feed`) VALUES('$userid','$feed')") or mysql_error();

if(isset($row))
{
	echo "Success";
}
else
{
	echo "Not Success";
}
mysql_close();
?>
