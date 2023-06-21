<?php
include("conn.php");

$id=$_REQUEST["userid"];
$nm=$_REQUEST["username"];
$oldpass=$_REQUEST["oldpass"];
$newpass=$_REQUEST["newpass"];
$mobile=$_REQUEST["mobile"];

$q=mysql_query("select * from users where mail='$id'") or mysql_error();
$qq=mysql_fetch_array($q);
if($oldpass==$qq['pass'])
{
	$query=mysql_query("UPDATE `users` SET `name`='$nm',`pass`='$newpass',`mobile`='$mobile' WHERE mail='$id'") or mysql_error();
	
	if(isset($query))
	{
		echo "Update Successfully..";
	}
	else
	{
		echo "Update Not Successfully";
	}
}
else
{
	echo "Old Password Not Match From Your Previous...";
}
mysql_close();
?>