<?php 
session_start();
if(isset($_SESSION['aid']))
{
include("../data_request_handeller/conn.php"); 
include("../frames/adminheader.php");
$get_staff=mysql_query("SELECT * from delivery_staff where status='1'") or mysql_error();
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
		<div class="col-xs-12 col-md-1"></div>
		<div class="col-xs-12 col-md-5">
		    <h2>Approve New Delivery Boys</h2>
		    <table class="table">
				<thead>
					<th>Name</th>
					<th>City</th>
					<th>Area</th>
					<th>Approve</th>
				</thead>
				<tbody>
		    <?php
		    $query=mysql_query("SELECT * from delivery_staff where status='0'");
		    while($approve=mysql_fetch_array($query))
		    {
		        echo"<tr>
		            <td>".$approve['name']."</td>
		            <td>".$approve['cno']."</td>
		            <td>".$approve['email']."</td>
		            <td><a href='../data_request_handeller/approve_boy.php?id=".$approve['id']."'>
							  <span class='glyphicon glyphicon-ok'></span>
							</a></td>
		        </tr>";
		    }
		    ?>
		    </tbody>
			</table>
		</div>
		
		<div class="col-xs-12 col-md-5">
		<form action="../data_request_handeller/set_schedule.php" method="post">
		    <h2>Schedule Deliveries</h2>
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
						$area=mysql_query("SELECT `id`, `name` FROM `loc` WHERE `city`='2' ");
						;
						
						echo"<tr><td><input type='hidden' name='nm[]' value=".$row["id"].">".$row["name"]."</td>";
						echo"<td><input type='hidden' name='city[]' value='2'>".$fetch_city["name"]."</td>";
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
			<input type="submit" name="sb" class="form-control" value="Set" />
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