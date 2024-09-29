<?php

	// Getting plant
	function getplants(){
		global $con;

		//condition to check isset or not

		if(!isset($_GET['category_id'])){
			$select_query="SELECT * FROM plants ORDER BY rand() LIMIT 0,9";
			$result_query=mysqli_query($con,$select_query);
			// $row=mysqli_fetch_assoc($result_query);
			// echo $row['product_title'];
			while($row=mysqli_fetch_assoc($result_query)){
				$plant_id=$row['plant_id'];
				$plant_name=$row['plant_name'];
				$plant_description=$row['plant_description'];
				$plant_image=$row['plant_image'];
				$plant_price=$row['plant_price'];

				echo "<div class='col-md-4 mb-2'>
					<div class='text-center mt-3'style='background-image: url('images/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;'>
						<img src='./admin_area/plant_images/$plant_image' class='card-img-top' alt=''>
						<div class='card-body mt-2' style='color: white;'>
							<h5 class='card-title' style='overflow: visible;''>$plant_name</h5>
							<p class='card-text'>$plant_description</p>
							<p class='card-text'>Price: $plant_price/=</p>
							<a href='plant_details.php?plant_id=$plant_id' class='btn' style='background-color: #07F927;'>Care Info</a>
							<a href='index.php?add_to_cart=$plant_id' class='btn btn-secondary' style='background-color: #027148;'>Add to cart</a>
						</div>
					</div>
				</div>";
			}
		}
	}

	// getting all plants
	function get_all_plants(){
		global $con;

		//condition to check isset or not

		if(!isset($_GET['category_id'])){
			$select_query="SELECT * FROM plants ORDER BY plant_name ASC";
			$result_query=mysqli_query($con,$select_query);
			// $row=mysqli_fetch_assoc($result_query);
			// echo $row['product_title'];
			while($row=mysqli_fetch_assoc($result_query)){
				$plant_id=$row['plant_id'];
				$plant_name=$row['plant_name'];
				$plant_description=$row['plant_description'];
				$plant_image=$row['plant_image'];
				$plant_price=$row['plant_price'];

				echo "<div class='col-md-4 mb-2'>
					<div class='text-center mt-3'style='background-image: url('images/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;'>
						<img src='./admin_area/plant_images/$plant_image' class='card-img-top' alt=''>
						<div class='card-body mt-2' style='color: white;'>
							<h5 class='card-title' style='overflow: visible;''>$plant_name</h5>
							<p class='card-text'>$plant_description</p>
							<p class='card-text'>Price: $plant_price/=</p>
							<a href='plant_details.php?plant_id=$plant_id' class='btn' style='background-color: #07F927;'>Care Info</a>
							<a href='index.php?add_to_cart=$plant_id' class='btn btn-secondary' style='background-color: #027148;'>Add to cart</a>
						</div>
					</div>
				</div>";
			}
		}
	}

	// getting unique categories
	function get_unique_category() {
	    global $con;

	    // Check if category_id is set
	    if (isset($_GET['category_id'])) {
	        $category_id = $_GET['category_id'];

	        // Fetch category title and types from categories table
	        $select_query = "SELECT category_title, types FROM categories WHERE category_id = $category_id";
	        $result_query = mysqli_query($con, $select_query);

	        if ($row = mysqli_fetch_assoc($result_query)) {
	            $category_title = $row['category_title'];
	            $types = $row['types'];

	            // Fetch plant IDs from plants_in_categories based on the category title
	            $select_query2 = "SELECT plant_id FROM plants_in_categories WHERE `$category_title` = '$types'";
	            $result_query2 = mysqli_query($con, $select_query2);

	            if (!$result_query2) {
	                die("Query failed: " . mysqli_error($con)); // Display the error message
	            }

	            $num_of_rows = mysqli_num_rows($result_query2);
	            if ($num_of_rows == 0) {
	                echo "<p class='text-center text-danger' style= 'font-size: 2em;'>No stock for this category</p>";
	            } else {
	                // Loop through each plant_id returned
	                while ($row2 = mysqli_fetch_assoc($result_query2)) {
	                    $plant_id = $row2['plant_id'];

	                    // Fetch plant details from plants table
	                    $select_query3 = "SELECT * FROM plants WHERE plant_id = $plant_id";
	                    $result_query3 = mysqli_query($con, $select_query3);

	                    if ($row3 = mysqli_fetch_assoc($result_query3)) {
	                        $plant_name = $row3['plant_name'];
	                        $plant_description = $row3['plant_description'];
	                        $plant_image = $row3['plant_image'];
	                        $plant_price = $row3['plant_price'];

	                        // Output the plant details
	                        echo "<div class='col-md-4 mb-2'>
						<div class='text-center mt-3'style='background-image: url('images/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;'>
							<img src='./admin_area/plant_images/$plant_image' class='card-img-top' alt=''>
							<div class='card-body mt-2' style='color: white;'>
								<h5 class='card-title' style='overflow: visible;'>$plant_name</h5>
								<p class='card-text'>$plant_description</p>
								<p class='card-text'>Price: $plant_price/=</p>
								<a href='plant_details.php?plant_id=$plant_id' class='btn' style='background-color: #07F927;'>Care Info</a>
								<a href='index.php?add_to_cart=$plant_id' class='btn btn-secondary' style='background-color: #027148;'>Add to cart</a>
							</div>
						</div>
					</div>";
	                    }
	                }
	            }
	        }
	    }
	}




	// displaying categories in sidenav
	function getcategories(){
	    global $con;

	    // Select distinct categories
	    $select_categories = "SELECT DISTINCT category_title FROM categories";
	    $result_categories = mysqli_query($con, $select_categories);

	    // Check if the categories result set is valid
	    if($result_categories){

	        // Loop through each category
	        while($row_data = mysqli_fetch_assoc($result_categories)) {
	            $category_title = $row_data['category_title'];
	            
	            echo "<li>
	                <a class='nav-item nav-link text-light' href='#' class='text-light' style=overflow: visible;'><p style='font-size: 20px; font-weight: bold; color: green;'>$category_title</p></a>
	                </li>";

	            // Fetch the types associated with the current category
	            $select_types = "SELECT category_id, types FROM categories WHERE category_title = '$category_title'";
	            $result_types = mysqli_query($con, $select_types);

	            // Check if we have types for the current category
	            if($result_types){
	                while($types_data = mysqli_fetch_assoc($result_types)) {
	                	$category_id=$types_data['category_id'];
	                    $types = $types_data['types'];
	                    echo "<li><a class='nav-item nav-link' href='index.php?category_id=$category_id' style='color: black;'>$types</a></li>";
	                }
	            }
	        }
	    } else {
	        echo "No categories found.";
	    }
	}





	// searching plants function

	function search_plant(){
		global $con;
		if(isset($_GET['search_data_plant'])){
			$search_data_value=strtolower($_GET['search_data']);
			$search_query="SELECT * FROM plants WHERE plant_keywords LIKE '%$search_data_value%'";
			
			$result_query=mysqli_query($con, $search_query);
			$num_of_rows=mysqli_num_rows($result_query);
			if($num_of_rows==0){
				echo "<h2 class='text-center text-danger'>No plant match found!</h2><br><br><br>";
			}
			while($row=mysqli_fetch_assoc($result_query)){
				$plant_id=$row['plant_id'];
				$plant_name=$row['plant_name'];
				$plant_description=$row['plant_description'];
				$plant_image=$row['plant_image'];
				$plant_price=$row['plant_price'];

				echo "<div class='col-md-4 mb-2'>
					<div class='text-center mt-3'style='background-image: url('images/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;'>
						<img src='./admin_area/plant_images/$plant_image' class='card-img-top' alt=''>
						<div class='card-body mt-2' style='color: white;'>
							<h5 class='card-title' style='overflow: visible;'>$plant_name</h5>
							<p class='card-text'>$plant_description</p>
							<p class='card-text'>Price: $plant_price/=</p>
							<a href='plant_details.php?plant_id=$plant_id' class='btn' style='background-color: #07F927;'>Care Info</a>
							<a href='search_plant.php?add_to_cart=$plant_id' class='btn btn-secondary' style='background-color: #027148;'>Add to cart</a>
						</div>
					</div>
				</div>";
			}
		}
	}

	// view details function

	function view_details(){
		global $con;

		//condition to check isset or not

		if(isset($_GET['plant_id'])){
			if(!isset($_GET['category'])){
				$plant_id=$_GET['plant_id'];
				$select_query="SELECT * FROM plants WHERE plant_id=$plant_id";
				$result_query=mysqli_query($con,$select_query);
				while($row=mysqli_fetch_assoc($result_query)){
					$plant_id=$row['plant_id'];
					$plant_name=$row['plant_name'];
					$plant_description=$row['plant_description'];
					$plant_image=$row['plant_image'];
					$plant_price=$row['plant_price'];

					$select_query_2="SELECT * FROM plant_care_by_id WHERE plant_id=$plant_id";
					$result_query_2=mysqli_query($con,$select_query_2);
					while($row=mysqli_fetch_assoc($result_query_2)){
						$plant_id=$row['plant_id'];
						$leaf_care=$row['leaf_care'];
						$placement=$row['placement'];
						$soil_quality=$row['soil_quality'];
						$temperature=$row['temperature'];
						$humidity=$row['humidity'];
						
						$select_query_3="SELECT special_features FROM plants_in_categories WHERE plant_id=$plant_id";
						$result_query_3=mysqli_query($con,$select_query_3);
						$feature=mysqli_fetch_assoc($result_query_3)['special_features'];

						echo "<div class='col-md-4 mb-2'>
								<div class='text-center mt-3'style='background-image: url('images/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;'>
									<img src='./admin_area/plant_images/$plant_image' style='position: relative; width: 100%; height: 100%; overflow: hidden;' alt=''>
								</div>
							</div>
							<div class='col-md-8 mb-5'>
								<div class='row'>
									<div class='col-md-12 mt-2 text-center' style='color: white;'>
										<p class='card-title' style='overflow: visible; font-size: 35px; font-weight: bold;'>$plant_name</p>
										<p class='card-text'>$plant_description</p>
									</div>
									<div class='col-md-12 mt-5'>
										<h4 class='text-center mb-5' style='color: white; overflow: visible;'>Care Information</h4>
									</div>
									<div class='col-md-12 mb-5' style='color: white;'>
										<p><strong>Leaf Care: </strong>$leaf_care</p>
										<p><strong>Placement: </strong>$placement</p>
										<p><strong>Soil Quality: </strong>$soil_quality</p>
										<p><strong>Temperature: </strong>$temperature</p>
										<p><strong>Humidity: </strong>$humidity</p>
										<p><strong>Special Features: </strong>$feature</p>
									";
					}
					$select_query_3="SELECT * FROM issues_solutions WHERE plant_id=$plant_id";
					$result_query_3=mysqli_query($con,$select_query_3);
					while($row3=mysqli_fetch_assoc($result_query_3)){
						$plant_id=$row3['plant_id'];
						$issue_names=$row3['issue_names'];
						$solutions=$row3['solutions'];
						$medicines=$row3['medicines'];

						echo "<p><strong>Issues: </strong>$issue_names</p>
								<p><strong>Solutions: </strong>$solutions</p>
								<p><strong>Medicines: </strong>$medicines</p>
							</div>
							<div class='col-md-12' style='color: white;'>
										<p class='card-text'>Price: $plant_price/=</p>
										<a href='index.php' class='btn' style='background-color: #07F927;'>Go Home</a>
										<a href='index.php?add_to_cart=$plant_id' class='btn btn-secondary' style='background-color: #027148;'>Add to cart</a>
									</div>
								</div>
							</div>";
					}
				}
			}
		}
	}

	// get ip address function

	function getIPAddress() {  
	    //whether ip is from the share internet  
	    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }  
	    //whether ip is from the proxy  
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
	    }  
		//whether ip is from the remote address  
		else {  
		    $ip = $_SERVER['REMOTE_ADDR'];  
		}  
	    return $ip;  
	}  
	// $ip = getIPAddress();  
	// echo 'User Real IP Address - '.$ip;


	// cart function
	function cart(){
		if(isset($_GET['add_to_cart'])){
			global $con;

			$get_ip_address = getIPAddress();
			$get_plant_id=$_GET['add_to_cart'];
			$select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address' and plant_id=$get_plant_id";
			$result_query=mysqli_query($con, $select_query);
			$num_of_rows=mysqli_num_rows($result_query);
			if($num_of_rows>0){
				echo "<script>alert('This item is already in your cart')</script>";
				echo "<script>window.open('index.php','_self')</script>";
			} else {
				$insert_query="INSERT INTO cart_details (plant_id, ip_address, quantity) VALUES ($get_plant_id, '$get_ip_address', 1)";
				$result_query=mysqli_query($con, $insert_query);
				echo "<script>alert('Item is added successfully')</script>";
				echo "<script>window.open('index.php','_self')</script>";
			}
		}
	}

	// function to get cart item numbers
	function cart_item(){
		global $con;

		$get_ip_address = getIPAddress();
		$select_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
		$result_query=mysqli_query($con, $select_query);
		$count_cart_items=mysqli_num_rows($result_query);
		echo $count_cart_items;
	}

	// total price function
	function total_cart_price(){
		global $con;

		$get_ip_address=getIPAddress();
		$total_price=0;
		$cart_query="SELECT * FROM cart_details WHERE ip_address='$get_ip_address'";
		$result=mysqli_query($con, $cart_query);
		while($row=mysqli_fetch_array($result)){
			$plant_id=$row['plant_id'];
			$quantity=$row['quantity'];
			$select_plants="SELECT * FROM plants WHERE plant_id=$plant_id";
			$result_plants=mysqli_query($con, $select_plants);
			while($row_plant_price=mysqli_fetch_array($result_plants)){
				$plant_price=$row_plant_price['plant_price'];
				$total_price+=$plant_price*$quantity;
			}
		}
		return $total_price;
	}

	// get user order details
	function get_user_order_details(){
		global $con;
		$username=$_SESSION['username'];
		$get_details="SELECT * FROM user_table WHERE username='$username'";
		$result_query=mysqli_query($con,$get_details);
		while($row_query=mysqli_fetch_array($result_query)){
			$user_id=$row_query['user_id'];
			if(!isset($_GET['edit_account'])){
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['delete_account'])){
						$get_orders="SELECT * FROM user_orders WHERE user_id=$user_id AND order_status='pending'";
						$result_orders_query=mysqli_query($con,$get_orders);
						$row_count=mysqli_num_rows($result_orders_query);
						if($row_count>0){
							$order_id=mysqli_fetch_assoc($result_orders_query)['order_id'];
							echo "<p class='text-center mt-5 mb-2' style='color: white; font-size: 2em;'>You have <span class='text-danger'>$row_count</span> pending orders</p>";
							$order_query="SELECT * FROM order_details WHERE order_id='$order_id'";
							$result=mysqli_query($con, $order_query);

							echo "<table class='table table-bordered text-center'><thead>
							<tr>
								<th>Product Title</th>
								<th>Product Image</th>
								<th>Quantity</th>
								<th>Total Price</th>
							</tr>
							</thead>
							<tbody>";

							while($row=mysqli_fetch_array($result)){
								$plant_id=$row['plant_id'];
								$quantity=$row['quantity'];
								$select_plants="SELECT * FROM plants WHERE plant_id=$plant_id";
								$result_plants=mysqli_query($con, $select_plants);
								$row_plant_details=mysqli_fetch_array($result_plants);
								$plant_title=$row_plant_details['plant_name'];
								$plant_image=$row_plant_details['plant_image'];
								$plant_price=$row_plant_details['plant_price'];
								$plant_total_price=$plant_price*$quantity;


								echo "<tr>
									<td>$plant_title</td>
									<td><img src='../images/$plant_image' style='top: 50%; left: 50%; width: 30%; height: 30%; object-fit: cover;'></td>
									<td>$quantity</td>
									<td>$plant_total_price/-</td>
								</tr></table>";
							}
						} else {
							echo "<p class='text-center mt-5 mb-2' style='color: white; font-size: 2em;'>You have zero pending orders</p>
								<p class='text-center'><a href='../index.php' style='color: white;'>Explore products</a></p>";
						}
					}
				}
			}
		}
	}

	// Getting care_info
	function care_info(){
		global $con;

		//condition to check isset or not

		if(!isset($_GET['category_id'])){
			$select_query="SELECT * FROM plant_care_by_type ORDER BY plant_type_names ASC";
			$result_query=mysqli_query($con,$select_query);

			echo "<div style='color: white;'><ol>
			<li><p class='' style='font-size: 2em;'>Plant Types</p></li>
			<li>Foliage Plant: <ul><li>Grown primarily for their decorative leaves rather than flowers.</li><li>Leaves may be variegated, textured, or colorful, ranging from deep green to shades of purple or silver.</li><li>Typically requires indirect sunlight and moderate watering.</li><li>Examples include Monstera, Philodendron, and Calatheas.</li></ul></li>
			<li>Flowering Plant: <ul><li>Known for producing vibrant, fragrant blooms.</li><li>Requires more sunlight, especially direct sunlight, to support blooming.</li><li>Flowers may appear seasonally or year-round, depending on the species.</li><li>Needs regular deadheading (removal of spent flowers) to promote continued blooming.</li><li>Examples include Roses, Orchids, and Geraniums.</li></ul></li>
			<li>Succulent: <ul><li>Recognized by their thick, fleshy leaves or stems that store water.</li><li>Often small or compact in size, with a rosette or clustered growth pattern.</li><li>Requires minimal watering and thrives in dry, arid environments with plenty of sunlight.</li><li>Typically has a waxy or leathery surface to prevent water loss.</li><li>Examples include Aloe, Echeveria, and Cacti.</li></ul></li>
			<li>Air Plant: <ul><li>Epiphytic, meaning they grow without soil, absorbing moisture and nutrients from the air.</li><li>Characterized by spiky, grassy, or delicate leaves, often silver or green in color.</li><li>Typically small and lightweight, making them ideal for mounting on displays or hanging arrangements.</li><li>Requires regular misting or soaking to stay hydrated.</li><li>Examples include Tillandsia species.</li></ul></li>
			<li>Fern: <ul><li>Identified by their finely divided, feathery fronds.</li><li>Prefers low light and high humidity environments, making them ideal for shaded indoor areas.</li><li>Requires consistently moist soil but can be sensitive to overwatering.</li><li>Can range from small, potted plants to large, spreading varieties.</li><li>Examples include Boston Fern, Maidenhair Fern, and Staghorn Fern.</li></ul></li>
			<li>Tropical Plant: <ul><li>Native to warm, humid regions, often with large, broad, and glossy leaves.</li><li>Requires high humidity and indirect light, mimicking rainforest conditions.</li><li>Tends to grow vigorously in the right environment, with leaves that can reach impressive sizes.</li><li>Soil needs to be rich and well-draining, often supplemented with organic material.</li><li>Examples include Bird of Paradise, Fiddle Leaf Fig, and Peace Lily.</li></ul></li>
			<li>Vine Plant: <ul><li>Known for their long, trailing or climbing stems, often used in hanging baskets or for vertical growth.</li><li>Can climb trellises or walls, attaching themselves using tendrils or aerial roots.</li><li>Leaves are often heart-shaped or oval and may vary in size and color.</li><li>Thrives in indirect light and requires regular pruning to control growth.</li><li>Examples include Pothos, Ivy, and Philodendron varieties.</li></ul></li>
			</ol></div>";

			echo "<br><hr><br>
			<p style='font-size: 1.5em; color: white;'><strong>Needs of Our Plants</strong></p><br><br>";
			// $row=mysqli_fetch_assoc($result_query);
			// echo $row['product_title'];
			while($row=mysqli_fetch_assoc($result_query)){
				$plant_type_names=$row['plant_type_names'];
				$leaf_care=$row['leaf_care'];
				$placement=$row['placement'];
				$soil_quality=$row['soil_quality'];
				$temperature=$row['temperature'];
				$humidity=$row['humidity'];

				echo "<div class='col-md-4 mb-2'>
					<div class='mt-3'style='background-image: url('images/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;'>
						<div class='card-body mt-2' style='color: white;'>
							<h5 class='card-title' style='overflow: visible;'>$plant_type_names</h5>
							<ul><li><p class='card-text'><strong>Leaf Care:</strong> $leaf_care</p></li>
							<li><p class='card-text'><strong>Placement:</strong> $placement</p></li>
							<li><p class='card-text'><strong>Soil Quality:</strong> $soil_quality</p></li>
							<li><p class='card-text'><strong>Temperature:</strong> $temperature</p></li>
							<li><p class='card-text'><strong>Humidity:</strong> $humidity</p></li></ul>
						</div>
					</div>
				</div>";
			}
		}
	}
?>