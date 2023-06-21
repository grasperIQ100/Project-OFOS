<?php
include("conn.php");
$date=date("Y-m-d");
$result = array();
if(isset($_POST["sb"]))
{
	delivery_order();
}
else if(isset($_POST["truck_sb"]))
{
	truck_order();
}
function delivery_order()
{
	$name=$_POST["nm"];
	$city=$_POST["city"];
	$area=$_POST["area"];
	foreach($name as $name=>$values)
	{	
		$result[] = array( $values, $name[$name],  $city[$name], $area[ $name ] );
		
		mysql_query("INSERT INTO `delivery_schedule`(`staff_id`, `date`, `location`, `city`) VALUES ('$values','$date','$area[$name]','$city[$name]')");
		header("location:../admin/delivery.php");
	}
}
function truck_order()
{
	$name=$_POST["nm"];
	$city=$_POST["city"];
	$area=$_POST["area"];
	foreach($name as $name=>$values)
	{	
		$result[] = array( $values, $name[$name],  $city[$name], $area[ $name ] );
		echo $values;
		echo $city[$name];
		echo $area[$name];
		mysql_query("INSERT INTO `truck_schedule`(`truck_id`, `date`, `location`, `city`) VALUES ('$values','$date','$area[$name]','$city[$name]')");
	}
	echo"truck";
}
?>