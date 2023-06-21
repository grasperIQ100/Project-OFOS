<?php session_start(); ?>
<?php
$tbl=$_POST['id'];
$adminid=$_POST['unm'];
$pass=$_POST['pw'];

if(empty($adminid))
{
			echo "<script language=javascript>alert('Please Enter Valid User id and Password'); window.location='../index.php';</script>";
}
elseif(empty($pass))
{
			echo "<script language=javascript>alert('Please Enter Valid User id and Password'); window.location='../index.php';</script>";
}
else
{
	include("conn.php");
	$query=mysql_query("select * from $tbl where mail='$adminid' and pass='$pass'") or mysql_errno();

	if($query) 
	{
		if(mysql_fetch_array($query))
		{
			if($tbl=="admin")
			{
				
				$_SESSION['aid']=$adminid;
				header("location: ../admin/adminindex.php");
			}
			else if($tbl=="users")
			{
				
				$_SESSION['uid']=$adminid;
				header("location:../userindex.php");
			}
			else if($tbl=="truck")
			{
				$_SESSION['tid']=$adminid;
				header("location:../truck/main.php");
			}
			else if($tbl=="mess")
			{
				$_SESSION['mid']=$adminid;
				header("location:../mess/main.php");
			}
		}
		else
		{
			if($tbl=="admin")
			{
				echo "<script language=javascript>alert('Please Enter Valid User id and Password'); window.location='../adminlogin.php';</script>";
				header("location:./index.php");
			}
			else if($tbl=="users")
			{
				echo "<script language=javascript>alert('Please Enter Valid User id and Password'); window.location='../index.php';</script>";
				header("location:./index.php");
			}
			else if($tbl=="truck")
			{
				echo "<script language=javascript>alert('Please Enter Valid User id and Password')</script>";
				include("../truck/index.php");
			}
			else if($tbl=="mess")
			{
				echo "<script language=javascript>alert('Please Enter Valid User id and Password')</script>";
				include("../mess/index.php");
			}
		}
	}
	else
	{
		echo "Your Data Is Not Correct";
	}
}
?>
