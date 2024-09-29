<?php
include('../includes/connect.php');
include('../functions/common_functions.php');

if(isset($_GET['user_id'])){
	$user_id=$_GET['user_id'];
}

// getting total items and total price of all items
$get_ip_address=getIPAddress();
$total_price=0;
$total_quantity=0;
$cart_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
$result=mysqli_query($con, $cart_query);
while($row=mysqli_fetch_array($result)){
	$plant_id=$row['plant_id'];
	$quantity=$row['quantity'];
	$total_quantity+=$quantity;
	$select_plants="SELECT * FROM plants WHERE plant_id=$plant_id";
	$result_plants=mysqli_query($con, $select_plants);
	while($row_plant_price=mysqli_fetch_array($result_plants)){
		$plant_price=$row_plant_price['plant_price'];
		$total_price+=$plant_price*$quantity;
	}
}
$invoice_number=mt_rand();
$status='pending';

$insert_orders="INSERT INTO user_orders (user_id,amount,invoice_number,total_products,order_date,order_status) VALUES ($user_id,$total_price,$invoice_number,$total_quantity,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query){
	echo "<script>alert('Orders are submitted successfully')</script>";
	echo "<script>window.open('profile.php','_self')</script>";
}

$select_order_id = "SELECT * FROM user_orders WHERE invoice_number=$invoice_number";
$result_order_id = mysqli_query($con, $select_order_id);
$user_order_info = mysqli_fetch_assoc($result_order_id);

$order_id = $user_order_info['order_id'];

// order details
$cart_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
$result=mysqli_query($con, $cart_query);
while($row_orders=mysqli_fetch_array($result)){
	$plant_id=$row_orders['plant_id'];
	$quantity=$row_orders['quantity'];
	$insert_pending_orders="INSERT INTO order_details (order_id, invoice_number, plant_id, quantity, status) VALUES ($order_id, $invoice_number, $plant_id, $quantity, '$status')";
	$result_pending_orders=mysqli_query($con,$insert_pending_orders);
}
// delete items from cart
$empty_cart="DELETE FROM cart_details WHERE ip_address='$get_ip_address'";
$result_delete=mysqli_query($con,$empty_cart);

?>