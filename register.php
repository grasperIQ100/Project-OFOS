<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Meri Kitchen | Home</title>

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="assets/css/main.css" />

<style>

	input,textarea

	{

		margin-top: 2%;

	}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
 var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
</script>						
</head>



<body>

	<div class="row" style="margin-top: 6%;">

		<div class="col-xs-2 col-md-4"></div>

		

		<form action="data_request_handeller/reg.php" method="post" class="col-xs-8 col-md-4">

			<img src="assets/images/logo.png" style="align-content: center;" />

			<h2 align="center">Registration</h2>

			<input type="text" name="nm" placeholder="Enter Full Name" class="form-control" required />

			<input type="email" name="mail" placeholder="Enter E-mail" class="form-control" required />

			<input type="text" name="tel" placeholder="Enter Contact Number" class="form-control" maxlength="10" required />



			<input type="password" name="pass" class="form-control" id="password" placeholder="Enter Password" onkeyup='check();' required >

			<input type="password" name="pass1" class="form-control" id="confirm_password" placeholder="Confirm Password" onkeyup='check();' required >
			<div> <span id='message'></span> </div>
			<input type="text" name="refer" placeholder="Ref Code" class="form-control" />

			<input type="submit" name="sb">

		</form>

	</div>

</body>

</html>