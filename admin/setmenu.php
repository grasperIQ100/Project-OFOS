<?php
session_start();
if(isset($_SESSION['aid']))
{
include("../frames/adminheader.php"); 
include("../data_request_handeller/conn.php");
function get_dish()
{
    $dish=mysql_query("select * from thali where `is_deleted`=0 ");
    while($gd=mysql_fetch_array($dish))
    {
        echo"<option value=".$gd['id'].">".$gd['thali']."</option>";
    }
}

?>
<html>
<head>
<meta charset="utf-8">
<title>Menu | Meri Kitchen</title>
<link rel="stylesheet" type="text/css" href="../assets/css/admin.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
	$('document').ready(function(e){
		$('.sbi').click(function(){
				$(this).parent().append("<br><input type='text' name='frm[]' placeholder='add item' class='form-control'/>");
				$(this).parent().append("<input type='text' name='qty[]' placeholder='add qty' class='form-control'/>");
				$(this).parent().append("<select class='form-control' style='width: 45%' name='type[]' required><?php get_dish(); ?></select>");
				$(this).parent().append("<input type='text' name='ingre[]' placeholder='ingredients' class='form-control' />");
		
			});
	});
</script>
</head>
<body>
	<div class="row">
	
		
		<div class="col-xs-12 col-md-8">
			<form action="#" method="post">
			<div class="col-xs-1 col-md-1"></div>
				<div class="col-xs-8 col-md-4">
				Date:<input type="date" name="dto" class="form-control">
				</div>
				<div class="col-xs-3 col-md-2">	<br>			
					<input type="submit" name="sb" class="form-control" style="background-color: blue; color: white;">
				</div>
			</form>
		</div>
	</div>
		<div class="row">
				<div class="col-xs-12 col-md-1"></div>
					<div class="col-xs-8 col-md-5">
						<div class="container-fluild" style=" background-color: rgba(66,66,66,0.55); height: 500px; overflow: scroll;">
							<!-- set menu -->
							<?php 
									if(isset($_POST['sb']))
									{
										$do=$_POST['dto'];
										//$dt=$_POST['dtt'];
		
										$datetime = new DateTime($do);
										//$datetime2 = new DateTime($dt);
										//$daterange = new DatePeriod($datetime1, new DateInterval('P1D'), $datetime2);

										//foreach($daterange as $date)
										//{
    										$ddate=$datetime->format("d-m-Y");
											$dday=$datetime->format("l");
											$day=strtolower($dday);
											
							?>	
											<div class="row">
												<div class="col-xs-1 cold-md-1"></div>
												<div class="col-xs-6 cold-md-6">
													<div class="wfrm">
															<form action="../data_request_handeller/insmenu.php" method="POST">
																<?php echo "<br>".$ddate."  ". $dday; ?><br>
															 	<input type="hidden" name="tbl" value="<?php echo $day ?>"/>
															 	<input type="hidden" name="dt" value="<?php echo $ddate ?>"/>
																<button type="button" class="sbi" name="addit">Add Item</button>
																<input type="submit" name="subi" value="Add Menu">
															</form>
													</div>
												</div>
											</div>
							<?php //}
									}
							?>
						</div>
					</div>
					<div class="col-xs-12 col-md-5" style="background-color: rgba(0,0,0,0.30); padding-bottom: 6%; border-radius: 5%;">
		<h2>M E N U</h2>
		<form action="../data_request_handeller/show_menu.php" method="post"  >
			<input class="form-control" name="menudate" type="date" />
			<br>
			<button type="submit" class="form-control" >View Menu</button>
		</form>
	</div>
		</div>
</body>
<?php include("../frames/adminfooter.php"); ?>
</html>
<?php
}
else
{
	header("location:../aminindex.php");
}
?>