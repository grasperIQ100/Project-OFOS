<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Meri Kitchen | Reports</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="row">
		<div class="col-xs-2 col-md-4"></div>
		<div class="col-xs-8 col-md-3" >
			<img src="../assets/images/logo.png" width="100%" height="100%" />
			<h1 align="center">Income Report</h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-xs-1 col-md-1"></div>
		<div class="col-xs-10 col-md-10">
			<table class="table">
			<thead>
				<tr>
					<th>Date</th>
					<th>Day</th>
					<th>Earning</th>
					<th>Discount Amount</th>
				</tr>
				</thead>
				<tbody>
					<?php 
										$do=$_POST['dto']; //gets from date	
										$dt=$_POST['dtt']; //gets to date
										$tdate=date("Y-m-d"); //gets current date 
										include("conn.php");
										$datetime1 = new DateTime($do); //conversions
										$datetime2 = new DateTime($dt);
										$datetime2 = $datetime2->modify( '+1 day' ); 
										$daterange = new DatePeriod($datetime1, new DateInterval('P1D'), $datetime2); //gets range of date

										foreach($daterange as $date) //for every date
										{
    										$ddate=$date->format("Y-m-d"); //sets the format of the date in loop
											$dday=$date->format("l"); //gets the day of particular date
											$day=strtolower($dday);
											$not=0; //counting variable of no. of thalis
											$amt=0; //total amount of no of thalis
											$dis=0;
											$q=mysql_query("SELECT  SUM(final_amt) AS final, SUM(dis_avail) AS ds FROM `order_details`  WHERE `date`='$ddate' and `is_cancel`='2' ") or mysql_errno(); //
											$row=mysql_fetch_array($q);
											
							?>	
								<tr>
									<td><?php echo $ddate; ?></td>
									<td><?php echo $dday; ?></td>
									<td><?php echo $row['final']; ?></td>
									<td><?php echo $row['ds']; ?></td>
									
								</tr>
							<?php }
							?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>