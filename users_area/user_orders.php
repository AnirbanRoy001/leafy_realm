<IDOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>My Orders</title>
</head>
<body>
	<?php

	$username=$_SESSION['username'];
	$get_user="SELECT * FROM user_table WHERE username='$username'";
	$result=mysqli_query($con,$get_user);
	$row_fetch=mysqli_fetch_assoc($result);
	$user_id=$row_fetch['user_id'];
	// echo $user_id;
	
	?>
	<p class="mt-1" style="color: white; font-size: 1.7em;">All my Orders</p>
	<table class="table table-bordered mt-5">
		<thead style="background-color: 00d800;">
			<tr>
				<th>Sl no</th>
				<th>Total Amount</th>
				<th>Total products</th>
				<th>Invoice Number</th>
				<th>Date</th>
				<th>Payment Status</th>
				<th>Confirmation</th>
			</tr>
		</thead>
		<tbody class="bg-secondary text-light">
			<?php
				$get_order_details="SELECT * FROM user_orders WHERE user_id=$user_id";
				$result_orders=mysqli_query($con,$get_order_details);
				$number=1;
				while($row_orders=mysqli_fetch_assoc($result_orders)){
					$order_id=$row_orders['order_id'];
					$total_amount=$row_orders['amount'];
					$order_date=$row_orders['order_date'];
					$total_products=$row_orders['total_products'];
					$invoice_number=$row_orders['invoice_number'];
					$order_status=$row_orders['order_status'];
					if($order_status=='pending'){
						$order_status='Incomplete';
					} else {
						$order_status='Complete';
					}
					echo "<tr>
					<td>$number</td>
					<td>$total_amount/=</td>
					<td>$total_products</td>
					<td>$invoice_number</td>
					<td>$order_date</td>
					<td>$order_status</td>";
					if($order_status=='Complete'){
						echo '<td>Confirmed</td>';
					} else {
						echo "<td><a href='confirm_payment.php?order_id=$order_id' style='color: black;'>Confirm</a></td>";
					}
					$number++;
				}
			?>
		</tbody>
	</table>
</body>
</htm1>