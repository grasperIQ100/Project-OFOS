<?php

	include("data_request_handeller/conn.php");
	$v=$_GET['v'];
	$l = mysql_query("select * from loc where city='".$v."'");
	while($ll = mysql_fetch_array($l))
	{  
?>
	<option name="<?php echo $ll['name']; ?>" value="<?php echo $ll['id']; ?>"><?php echo $ll['name']; ?> </option>
<?php 
	}
?>
