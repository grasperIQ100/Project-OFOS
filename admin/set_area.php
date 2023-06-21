<?php 
session_start();
if(isset($_SESSION['aid']))
{
include("../frames/adminheader.php"); 

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Set Area</title>
 <link rel = "stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script>
                $(document).ready(function(){
                $('#mytable').dataTable();
});
</script> 
</head>

<body>
 	<div class="row">
		 <div class="col-xs-1 col-md-3"></div>
		 	<div class="col-xs-7 col-md-4">
		 		<h2>Add New Area Details</h2>
				 <form method="POST" action="../data_request_handeller/addarea.php?epr=areasubmit">
					<input type="text" class="form-control" name="city" placeholder="Pune" required readonly/><br>
					<input type="text" class="form-control" name="aname" placeholder="Area Name" required /><br>
					<input type="submit" name="areasubmit">
				 </form>
			 </div>
	 
		 <div class="col-xs-1 col-md-3"></div>
		 	<div class="col-xs-7 col-md-4">
		 		<h2>Area Details</h2>
		<form method="GET" action=" ">
					<div class="table-responsive">	
				<div class="col-md-12" style="overflow-x: auto">
				<div class =  "table-bordered results">
					 <table  class="table table-condensed table-bordered table-hover" id="mytable">
						 <thead>
                                <tr>
									<th><b> <center>No</center></b></th>
									<th><b><center>Area Name </center></b></th>
									<th><b><center> Action</center></b></th>
				        	
								</tr>
                         </thead>
					<tbody>
						<?php include("../data_request_handeller/conn.php");
				                	$sql=mysql_query("SELECT * from loc");
								$i=1;
								  while($row=mysql_fetch_assoc($sql))
									{ 
								
											echo '<tr>'.'<td>'.$i.'</td>';
                                            echo '<td>'.$row['name'].'</td>'; 
echo '<td>'.'<a href="../admin/deletearea.php?id='.$row['id'].'"> <span class="button-2">Delete</span> </a>'.'</td>'.'</tr>';	
					$i++;		    	}
					   ?>
				
					</tbody>			
                        </table>
				</div>
			</div>
					</form>	
                        			
	 </div>
	 
	
</body>
<?php include("../frames/adminfooter.php"); ?>
</html>
<?php
	}
else
{
	header("location:../index.php");
}
?>