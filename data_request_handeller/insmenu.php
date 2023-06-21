<?php 
include("../data_request_handeller/conn.php");
$name=$_POST["frm"];
$tb=$_POST["tbl"];
$date=$_POST["dt"];
$q=$_POST["qty"];
$t=$_POST["type"];
$i=$_POST["ingre"];
$result = array();
$dt=date("Y-m-d",strtotime($date));
foreach($name as $name=>$values)
{		
	$result[] = array( $values,  $q[$name], $t[ $name ], $i[$name] );
	mysql_query("INSERT INTO `menu`(`name`, `reg`, `qty`, `menu_date`, `ingre`) values('$values','$t[$name]','$q[$name]' ,'$dt', '$i[$name]')");
			//mysql_query("INSERT INTO `$tb`(`name`) VALUES ('$values')") or mysql_error();
			//mysql_query("INSERT INTO `$tb`(`type`) VALUES ('$t[$name]')") or mysql_error();
			//mysql_query("INSERT INTO `$tb`(`qty`, `menu_date`) VALUES ('$q[$name]','$date')") or mysql_error();	
}
header("location:../admin/setmenu.php");
?>