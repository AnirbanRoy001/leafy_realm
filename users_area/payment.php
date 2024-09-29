<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Payment Page</title>
	<!-- bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style>
		.payment_img{
			width:90%;
			margin:auto;
			display:block;
		}
	</style>
</head>
<body>
	<!-- php code to access user id -->
	<?php

	$user_ip=getIPAddress();
	$get_user="SELECT * FROM user_table WHERE user_ip='$user_ip'";
	$result=mysqli_query($con,$get_user);
	$run_query=mysqli_fetch_array($result);
	$user_id=$run_query['user_id'];

	?>

	<div class="container">
		<p class="text-center" style="color: white; font-size: 1.5em;">Add to Order List</p>
		<div class="row d-flex justify-content-center align-items-center my-5">
			<div class="col-md-12">
				<a href="order.php?user_id=<?php echo $user_id; ?>" style="color: white; font-size: 1em;"><p class="text-center">Add from cart<p></a>
			</div>
		</div>
	</div>
</body>
</html>