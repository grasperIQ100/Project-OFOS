<?php
	include "data_request_handeller/conn.php";
	$query="SELECT img FROM delivery_staff";

	$rs=mysql_query($query);
	while($row=mysql_fetch_assoc($rs))
	{
	    
	//	echo $row['img'];
	 $image = $row['img'];
   echo "<img src='$image' >";
echo	 $image;
//echo base64_decode( $image);
    
	}
	//print json_encode($data);


?>