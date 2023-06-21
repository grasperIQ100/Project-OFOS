<?php
include("conn.php");
$cat=$_REQUEST["category"];
$nm=$_REQUEST["username"];
$mob=$_REQUEST["mobileno"];
$email=$_REQUEST["email"];
$pas=$_REQUEST["password"];
$city=$_REQUEST["city"];
$address=$_REQUEST["address"];
$img=$_REQUEST["img"];
$res=array();
if($cat=="Delivery Boy")
{
	$fetch=mysql_query("SELECT mail, mobile FROM delivery_staff");
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
				mysql_query("INSERT INTO `delivery_staff` (`name`, `city`, `mobile`, `mail`, `address`, `pass`, `img`, `status`) VALUES ('$nm', '$city', '$mob', '$email', '$address', '$pas', '$img', '0') ") or mysql_errno();
				$res["message"]="Registration Successfully";
			    echo json_encode($res);
					exit();

}
else
{
    $res["message"]="Plaese select category";
			    echo json_encode($res);
	//echo"password not match";
	//header("location:../register.php");
	exit();
}



?>