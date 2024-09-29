<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_functions.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Leafy Realm-Cart details</title>
	<!-- bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- font awesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer">
	<!-- CSS file -->
	<link rel="stylesheet" href="style.css">
</head>
<body style="background-image: url('images/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
	<!-- navbar -->
	<div class="container-fluid p-0">
		<!-- first child -->
		<?php include("./includes/navbar.php") ?>

		<!-- calling cart function -->
		<?php
		cart();
		total_cart_price();
		?>

		<!-- third child -->
		<div class="p-2" style="color: #d3f1d4;">
			<h3 class="text-center" style="overflow: visible;">Leafy Realm</h3>
			<p class="text-center"><strong>Information about plants is equal to information about life</strong></p>
		</div>

		<!-- fourth child -->
		<dic class="container">
			<div class="row">
				<form action="" method="post">
					<table class="table table-bordered text-center">
						
							<!-- php code to display data -->
							<?php

							$get_ip_address=getIPAddress();
							$cart_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
							$result=mysqli_query($con, $cart_query);
							$result_count=mysqli_num_rows($result);
							if($result_count>0){

								echo "<thead>
							<tr>
								<th>Product Title</th>
								<th>Product Image</th>
								<th>Quantity</th>
								<th>Price</th>
								<th>Remove</th>
								<th colspan='2'>Operation</th>
							</tr>
						</thead>
						<tbody>";

							while($row=mysqli_fetch_array($result)){
								$plant_id=$row['plant_id'];
								$select_plants="SELECT * FROM plants WHERE plant_id=$plant_id";
								$result_plants=mysqli_query($con, $select_plants);
								while($row_plant_price=mysqli_fetch_array($result_plants)){
									$plant_price=$row_plant_price['plant_price'];
									$plant_title=$row_plant_price['plant_name'];
									$plant_image=$row_plant_price['plant_image'];

							?>


							<tr>
								<td><?php echo $plant_title; ?></td>
								<td><img src="./admin_area/plant_images/<?php echo $plant_image; ?>" style="top: 50%; left: 50%; width: 30%; height: 30%; object-fit: cover;"></td>
								<td><input type="number" name="qty[<?php echo $plant_id; ?>]" class="form-input w-50" value="<?php echo $row['quantity']; ?>"></td>
								<td><?php echo $plant_price * $row['quantity']; ?>/-</td>
								<td><input type="checkbox" name="removeitem[]" value="<?php echo $plant_id; ?>"></td>
								<td>
									<input type="submit" value="Update Cart" class="mx-3 mb-5 px-3 py-2 border-0" style="background-color: #07F927;" name="update_cart">
									<input type="submit" value="Remove Cart" class="mx-3 mb-5 px-3 py-2 border-0" style="background-color: #07F927;" name="remove_cart">
								</td>
							</tr>

							<?php 

							}}} else { 
								echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
							} 

							?>

						</tbody>
					</table>
					

					<!-- subtotal -->
					<div class="d-flex">
						<?php

							$get_ip_address=getIPAddress();
							$cart_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
							$result=mysqli_query($con, $cart_query);
							$result_count=mysqli_num_rows($result);
							if($result_count>0){
								echo "<p class='px-3' style='font-size: 1.5em; color: white;'>Total Price: <strong>".total_cart_price()."</strong>/-</p>
								<input type='submit' value='Continue Shopping' class='mx-3 mb-5 px-3 py-2 border-0' style='background-color: #07F927;' name='continue_shopping'>
								<button class='bg-secondary mx-3 mb-5 px-3 py-2 border-0 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
							} else {
								echo "<input type='submit' value='Continue Shopping' class='mx-3 mb-5 px-3 py-2 border-0' style='background-color: #07F927;' name='continue_shopping'>";
							}

							if(isset($_POST['continue_shopping'])){
								echo "<script>window.open('index.php','_self')</script";
							}
						?>
						
					</div>
				</form>
			</div>
		</div>

		<?php
		
		if (isset($_POST['update_cart'])) {
			foreach ($_POST['qty'] as $plant_id => $quantity) {
				$update_query = "UPDATE cart_details SET quantity = $quantity WHERE plant_id = $plant_id AND ip_address='$get_ip_address'";
				mysqli_query($con, $update_query);
			}
			// Recalculate and update subtotal here
			echo "<script>window.open('cart.php','_self')</script>"; // Redirect after update
		}

		// function to remove items
		
		function remove_cart_item(){
			global $con;
			if(isset($_POST['remove_cart'])){
				foreach($_POST['removeitem'] as $remove_id){
					echo $remove_id;
					$delete_query="DELETE FROM cart_details WHERE plant_id=$remove_id";
					$run_delete=mysqli_query($con, $delete_query);
					if($run_delete){
						echo "<script>window.open('cart.php','_self')</script>";
					}
				}
			}
		}

		echo $remove_item=remove_cart_item();

		?>

		<!-- last child -->
		<!-- include footer -->
		<?php include("./includes/footer.php") ?>
	</div>



	<!-- bootstrap js link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> 
</body>
</html>