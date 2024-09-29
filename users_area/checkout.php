<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <title>Leafy Realm-Checkout page</title>
	<!-- bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<!-- font awesome link -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer">
	<!-- CSS file -->
	<link rel="stylesheet" href="../style.css">
</head>
<body style="background-image: url('../images/bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
	<!-- navbar -->
	<div class="container-fluid p-0">
		<!-- first child -->
		<!-- first child -->
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #c2f1c3;">
		    <div class="container-fluid">
			    <img src="../images/logo.png" alt="" class="logo">
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarSupportedContent">
			      	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				        <li class="nav-item">
				          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link" href="../display_all.php">All Plants</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link" href="../care_info.php">Plant Care</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link" href="user_registration.php">Register</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link" href="#contact_info">Contact</a>
				        </li>
			      	</ul>
			      	<form class="d-flex" action="search_plant.php" method="get">
			        	<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
				        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_plant">
			      	</form>
			    </div>
		  	</div>
		</nav>

		<!-- second child -->
		<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #256326;">
			<ul class="navbar-nav me-auto">
				<?php
					if(!isset($_SESSION['username'])){
						echo "<li class='nav-item'><a class='nav-link text-light' href='#'>Welcome Guest</a></li>";
					} else {
						echo "<li class='nav-item'><a class='nav-link text-light' href='#'>Welcome ".$_SESSION['username']."</a></li>";
					}
					if(!isset($_SESSION['username'])){
						echo "<li class='nav-item'><a class='nav-link text-light' href='./users_area/user_login.php'>Login</a></li>";
					} else {
						echo "<li class='nav-item'><a class='nav-link text-light' href='./users_area/logout.php'>Logout</a></li>";
					}
				?>
			</ul>
		</nav>

		<!-- third child -->
		<div class="p-2" style="color: #d3f1d4;">
			<h3 class="text-center" style="overflow: visible;">Leafy Realm</h3>
			<p class="text-center"><strong>Information about plants is equal to information about life</strong></p>
		</div>

		<!-- fourth child -->
		<div class="row px-1">
			<!-- Inside the row columns total space must be 12, you can divide it by any number with the summation of 12. -->

			<div class="col-md-12">
				<!-- products -->
				<div class="row">
					<?php
						if(!isset($_SESSION['username'])){
							echo "<script>alert('User Not Loged In')</script>";
							echo "<script>window.open('../cart.php','_self')</script>";
						} else {
							include('payment.php');
						}
					?>
				</div>
			</div>
		</div>

		<!-- last child -->
		<!-- include footer -->
		<div class="p-3 text-center" style="background-color: #005600; color: white;">
			<div id="contact_info">
			    <p style="font-size: 2em;">Contact Information</p>
			    <div class="contact-details">
		            <p><strong>Phone:</strong> (+880) 1716334950</p>
		            <p><strong>Email:</strong> group3@gmail.com</p>
		            <p><strong>Address:</strong> CSE370 (Section-14), BRAC University, Dhaka, Bangladesh</p>
		            <p><strong>Social Media:</strong> <img src="../images/facebook.jpg" alt="" style="width: 30px; height: 30px;"> <img src="../images/x.jpg" alt="" style="width: 30px; height: 30px;"> <img src="../images/instagram.jpg" alt="" style="width: 30px; height: 30px;"></p>
		        </div>
			    <!-- Additional content -->
			</div>
			<br><br>
			<hr>
			<div>
				<div class="container" style="background-color: white; width: 85px; height: 60px;">
					<img src="../images/logo.png" alt="" style="width: 100%; height: 100%;">
				</div>
				<p class="mt-2">All rights reserved &copy; Designed by Group-3</p>
			</div>
		</div>
	</div>





	<!-- bootstrap js link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>