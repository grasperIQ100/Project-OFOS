<?php



	include "data_request_handeller/conn.php";
	$query="SELECT * FROM thali";

	$rs=mysql_query($query);
	while($row=mysql_fetch_assoc($rs))
	{
		$data[]=$row;
	}
	print json_encode($data);


?>