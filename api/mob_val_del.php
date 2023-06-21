<?php
include("conn.php"); 
$nm=$_REQUEST["mobile"];
//echo $nm;
$query=mysql_query("select * from users where mobile='$nm'") or mysql_errno();

	    if(mysql_num_rows($query) > 0) 
	{

		if($row=mysql_fetch_array($query))
		{
		   echo "success";
		   exit();
        //echo $nmm=$row['name'];
		}
		
	}
	else
		{
		    echo "failure";
		    exit();
		}
/*while($row = mysql_fetch_array($res))
{
	array_push($result,array('email'=>$row['mail'],'pass'=>$row['pass']));
}
 
echo json_encode(array("result"=>$result));
 */
mysql_close($con);
 
?>