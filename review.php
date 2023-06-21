<?php
session_start();
include_once("data_request_handeller/conn.php");
if(isset($_SESSION['uid']))
{
    $user=$_SESSION['uid'];
    $getuser=mysql_query("select id from users where mail='$user'");
    $isuser=mysql_fetch_array($getuser);
	?>
<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Meri Kitchen | Reviews</title>

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="./assets/css/main.css" />
<script>
$('document').ready(function e(){
	$('h2').hide();
	$('#thanks').click(function(){
		$('#area').hide();
		$('h2').show();
	});
	
});	
</script>

</head>



<body>
<?php include("frames/userheader.php"); ?>

<div class="row" style="margin-top: 5%;">

	<div class="col-xs-1 col-md-4"></div>

	<div  class="cols-xs-10 col-md-4">

		<h1>Drop Us a Line</h1>

			<form action="data_request_handeller/incnt.php" method="post" >
				<h2>Thanks for feedback!</h2>
				<input type="hidden" name="uid" value="<?php echo $isuser['id']; ?>"/>
				<textarea class="form-control" id="area" name="mess" placeholder="Message" ></textarea><br>

				<button type="submit" id="thanks" class="col-xs-5 col-md-3" style="border: none;" >Submit</button>
				<button type="reset" class="col-xs-5 col-md-3" style="border: none; margin-left: 2%;" >Reset</button>

			</form>

	</div>

</div>

</body>

</html>

<?php
}
else
{
	header("location:index.php");
}
?>