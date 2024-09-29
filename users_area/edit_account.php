<?php
if(isset($_GET['edit_account'])){
	$user_session_name=$_SESSION['username'];
	$select_query="SELECT * FROM user_table WHERE username='$user_session_name'";
	$result_query=mysqli_query($con,$select_query);
	$row_fetch=mysqli_fetch_assoc($result_query);
	$user_id=$row_fetch['user_id'];
	$username=$row_fetch['username'];
	$user_email=$row_fetch['user_email'];
	$user_address=$row_fetch['user_address'];
	$user_mobile=$row_fetch['user_mobile'];
}
if(isset($_POST['user_update'])){
	$update_id=$user_id;
	$username=$_POST['username'];
	$user_email=$_POST['user_email'];
	$user_address=$_POST['user_address'];
	$user_mobile=$_POST['user_mobile'];
	$user_image=$_FILES['user_image']['name'];
	$user_image_tmp=$_FILES['user_image']['tmp_name'];
	move_uploaded_file($user_image_tmp,"./user_images/$user_image");

	// update query
	$update_data="UPDATE user_table SET username='$username', user_email='$user_email', user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id=$update_id";
	$result_query_update=mysqli_query($con,$update_data);
	if($result_query_update){
		echo "<script>alert('Data updated successfully')</script>";
		echo "<script>window.open('logout.php','_self')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Account</title>
</head>
<body>
	<p class="text-center mb-4" style="color: #00d800; font-size: 1.7em;">Edit Account</p>
	<form action="" method="post" enctype="multipart/form-data" class="text-center">
		<div class="form-outline mb-4">
			<input type="text" class="form-control w-50 m-auto" value="<?php echo $username ?>" name="username">
		</div>
		<div class="form-outline mb-4">
			<input type="text" class="form-control w-50 m-auto" value="<?php echo $user_email ?>" name="user_email">
		</div>
		<div class="form-outline mb-4 d-flex w-50 m-auto">
			<input type="file" class="form-control m-auto" name="user_image">
			<img src="./user_images/<?php echo $user_image ?>" alt="" class="user_image">
		</div>
		<div class="form-outline mb-4">
			<input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address ?>" name="user_address">
		</div>
		<div class="form-outline mb-4">
			<input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile ?>" name="user_mobile">
		</div>
		<input type="submit" value="update" class="py-2 px-3 border-0" style="background-color: #00d800;" name="user_update">
	</form>
</body>
</html>