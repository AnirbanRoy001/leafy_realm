<?php
include('../includes/connect.php');
include('../functions/common_functions.php');
@session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User -Login</title>
	<!-- bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<style>
		body{
			overflow-x: hidden;
		}
	</style>
</head>
<body>
	<div class="container-fluid my-3">
		<p class="text-center" style="font-size: 2.5em;">User Login</p>
		<div class="row d-flex align-items-center justify-content-center mt-5">
			<div class="col-1g-12 col-x1-6">
				<form action="" method="post">
					<!-- username field -->
					<div class="form-outline mb-4">
						<label for="user_username" class="form-label">Username</label>
						<input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
					</div>
					<!-- password field -->
					<div class="form-outline mb-4">
						<label for="user_password" class="form-label">Password</label>
						<input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
					</div>
					<div class="mt-4 pt-2">
						<input type="submit" value="Login" class="py-2 px-3 border-0" style="background-color: #07F927;" name="user_login">
						<p class="small fw-bold mt-2 mb-0 pt-1">Don't have an account ? <a href="user_registration.php" class="text-danger">Register</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['user_login'])){
		$user_username=$_POST['user_username'];
		$user_password=$_POST['user_password'];

		$select_query="SELECT * FROM user_table WHERE username='$user_username'";
		$result=mysqli_query($con,$select_query);
		$row_count=mysqli_num_rows($result);
		$row_data=mysqli_fetch_assoc($result);
		$user_ip=getIPAddress();

		//cart item
		$select_query_cart="SELECT * FROM cart_details WHERE ip_address='$user_ip'";
		$select_cart=mysqli_query($con,$select_query_cart);
		$row_count_cart=mysqli_num_rows($select_cart);

		if($row_count>0) {
			if(password_verify($user_password, $row_data['user_password'])) {
				$_SESSION['username']=$user_username;
				if($row_count_cart==0) {
					echo "<script>alert('Login Successful')</script>";
					echo "<script>window.open('profile.php','_self')</script>";
				} else {
					echo "<script>alert('Login Successful')</script>";
					echo "<script>window.open('profile.php','_self')</script>";
				}
			} else {
				echo "<script>alert('Invalid Password')</script>";
			}
		} else {
			echo "<script>alert('No User Found')</script>";
		}
	}
?>