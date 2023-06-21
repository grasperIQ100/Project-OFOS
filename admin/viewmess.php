<?php 
session_start();
if(isset($_SESSION['aid']))
{
include("../frames/adminheader.php"); ?>
<html>
<head>
<meta charset="utf-8">
<title>Orders</title>
<link href="../meri/assets/css/main.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1">
 
 <script>
$(document).ready(function(){
    $('#mytable').dataTable();
});
</script> 
</head>

<body>
    <form action="" method="POST">
    <div class="rows">
    <div class="col-md-1"></div>
<div class="table-responsive">	
				<div class="col-md-11" style="overflow-x: auto">
				<div class =  "table-bordered results">
					 <table  class="table table-condensed table-bordered table-hover" id="mytable">
    <thead>
      <tr>
        <th>Date</th>
        <th>Name</th>
        <th>Mobile</th>
        <th>Message</th>
        <th>Solved</th>
      </tr>
    </thead>
    <tbody>
      <?php include("../data_request_handeller/conn.php");
		$q=mysql_query("select f.added_on,f.id,f.feed,f.user_id,f.is_solve,u.name,u.mobile from feeds f join users u on f.user_id=u.id where f.user_id=u.id");
		while($row=mysql_fetch_array($q))
		{
		    if($row['is_solve']==1)
								{
									echo '<tr style="background-color:gray;">'.'<td>'.$row['added_on'].'</td>';
                                                echo '<td>'.$row['name'].'</td>'; 
												echo '<td>'.$row['mobile'].'</td>';												
                                                echo '<td>'.$row['feed'].'</td>';
                                               
												 // echo '<td>'."verify".'</td>'.'</tr>';  
                                               echo '<td>'.'<a href="../data_request_handeller/solve_query.php?id='.$row['id'].'"onclick="return confirm(\'are you sure you want to Respond this ?\');">Responded </a>'.'</td>'.'</tr>';   //action for delete 
								}
								else
								{
										echo '<tr>'.'<td>'.$row['added_on'].'</td>';
                                                echo '<td>'.$row['name'].'</td>'; 
												echo '<td>'.$row['mobile'].'</td>';												
                                                echo '<td>'.$row['feed'].'</td>';
                                                // echo '<td>'."verify".'</td>'.'</tr>';  
                                               echo '<td>'.'<a href="../data_request_handeller/solve_query.php?id='.$row['id'].'"onclick="return confirm(\'are you sure you want to Respond this ?\');">Responded </a>'.'</td>'.'</tr>';   //action for delete 
								}
		   
		}
		?>
    </tbody>
  </table></div></div></div>
  </form>
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