<p class="text-danger mb-4 mt-3" style="font-size: 2em;">Delete Account</p>
<form method="post" class="mt-5">
	<div class="form-outline">
		<input type="submit" class="form-control w-50 m-auto mb-4" name="delete" value="Delete Account">
	</div>
</form>

<?php
$_username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
	$delete_query="DELETE FROM user_table WHERE username='$_username_session'";
	$result=mysqli_query($con,$delete_query);
	if($result){
		session_destroy();
		echo "<script>alert('Account Deleted Successfully')</script>";
		echo "<script>window.open('../index.php','_self')</script>";
	}
}
?>