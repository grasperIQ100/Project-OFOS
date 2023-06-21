<?php
$nm=$_POST["nm"];
$mail=$_POST["mail"];
$phn=$_POST["tel"];
$pas=$_POST["pass"];
$pas1=$_POST["pass1"];
$ref=$_POST["refer"];
 
function generate_code()
{
	$code1=substr($_POST["nm"],0,3);
	$code2=substr($_POST["tel"],-3);
	$referall_code=strtoupper("$code1"."$code2");
	return($referall_code);
}
if($pas==$pas1)
{
	include("conn.php");
	$fetch=mysql_query("SELECT mail, mobile, ref_code FROM users ");
	while($row=mysql_fetch_array($fetch))
	{  
			if($mail===$row["mail"] or $phn===$row["mobile"])
			{
				exit("user exist");
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
					mysql_query("INSERT INTO `users`(`name`, `pass`, `mail`, `mobile`, `wallet_bal`, `ref_code`) VALUES ('$nm','$pas','$mail','$phn','50','$code') ") or mysql_errno();
					
				exit(header("location:../index.php"));
				
			}
			else
			{
				$code=generate_code();
				mysql_query("INSERT INTO `users`(`name`, `pass`, `mail`, `mobile`, `ref_code`) VALUES ('$nm','$pas','$mail','$phn','$code') ") or mysql_errno();
					exit(header("location:../index.php"));
					
	   		}
		}
	}
	else
	{
		$code=generate_code();
		mysql_query("INSERT INTO `users`(`name`, `pass`, `mail`, `mobile`, `ref_code`) VALUES ('$nm','$pas','$mail','$phn','$code') ") or mysql_errno();
		exit(header("location:../index.php"));
		//header("location:../index.php");
	}
}
else
{
	echo"password not match";
	//header("location:../register.php");
}

?>