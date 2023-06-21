<?php
include("conn.php");

$nm=$_REQUEST["username"];
$mob=$_REQUEST["mobileno"];
$email=$_REQUEST["email"];
$pas=$_REQUEST["password"];
$ref=$_REQUEST["referral"];

$res=array();
 
function generate_code()
{
	$code1=substr($_REQUEST["username"],0,3);
	$code2=substr($_REQUEST["mobileno"],-3);
	$referall_code=strtoupper("$code1"."$code2");
	return($referall_code);
}
if(!$pas=="")
{
	$fetch=mysql_query("SELECT mail, mobile, ref_code FROM users ");
	while($row=mysql_fetch_array($fetch))
	{  
			if($email===$row["mail"] or $mob===$row["mobile"])
			{
			    $res["message"]="User Exist";
			    echo json_encode($res);
			exit();
				//header("location:../register.php");
			}
		
	}
	if($ref)
	{
		$q=mysql_query("select ref_code from users") or mysql_errno();
		while($find_code=mysql_fetch_array($q))
		{  
			if($ref==$find_code["ref_code"])
			{
					$code=generate_code();
					mysql_query("INSERT INTO `users`(`name`, `pass`, `mail`, `mobile`, `wallet_bal`, `ref_code`) VALUES ('$nm','$pas','$email','$mob','50','$code') ") or mysql_errno();
					//header("location:../index.php");
				//echo"code exist";
				$res["message"]="Code Exist";
			    echo json_encode($res);
			    exit();
			}
			else
			{
				$code=generate_code();
				mysql_query("INSERT INTO `users`(`name`, `pass`, `mail`, `mobile`, `ref_code`) VALUES ('$nm','$pas','$email','$mob','$code') ") or mysql_errno();
				$res["message"]="Code Wrong";
			    echo json_encode($res);
					exit();
	   		}
		}
	}
	else
	{
		$code=generate_code();
		mysql_query("INSERT INTO `users`(`name`, `pass`, `mail`, `mobile`, `ref_code`) VALUES ('$nm','$pas','$email','$mob','$code') ") or mysql_errno();
		$res["message"]="Done Without Code";
			    echo json_encode($res);
		exit();
	}
}
else
{
    $res["message"]="Password Not Match";
			    echo json_encode($res);
	//echo"password not match";
	//header("location:../register.php");
	exit();
}



?>