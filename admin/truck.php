<?php
session_start();
if(isset($_SESSION['aid']))
{
include("../data_request_handeller/conn.php"); 
include("../frames/adminheader.php");
$get_staff=mysql_query("SELECT * from truck_staff") or mysql_error();
$d=date("Y/m/d"); //takes the current date

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delivery Panel</title>
</head>

<body>
	<div class="row">
		<div class="col-xs-1 col-md-4"></div>
		<div class="col-xs-10 col-md-4">
		<form action="../data_request_handeller/set_schedule.php" method="post">
			<table class="table">
				<thead>
					<th>Name</th>
					<th>City</th>
					<th>Area</th>
				</thead>
				<tbody>
				<?php
					while($row=mysql_fetch_array($get_staff))
					{
						$city=mysql_query("select id, name from city where id='".$row['city']."' ");
						$fetch_city=mysql_fetch_array($city);
						$area=mysql_query("SELECT `id`, `name` FROM `loc` WHERE `city`='".$row['city']."' ");
						;
						
						echo"<tr><td><input type='hidden' name='nm[]' value=".$row["id"].">".$row["reg_no"]."</td>";
						echo"<td><input type='hidden' name='city[]' value=".$fetch_city["id"].">".$fetch_city["name"]."</td>";
						echo"<td>
						<select name='area[]'>";
							while($fetch_area=mysql_fetch_array($area))
							{
								echo"<option value='".$fetch_area["id"]."'>".$fetch_area["name"]."</option>";
							}
						echo"</select>
						</td></tr>";
					}
				?>
				</tbody>
			</table>
			<input type="submit" name="truck_sb" class="form-control" value="Set" />
			</form>
		</div>
	</div>
</body>
</html>
<?php
}
else
{
	header("location:../index.php");
}
?>