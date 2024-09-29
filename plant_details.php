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
	<title>Leafy Realm</title>
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
		<!-- include navbar -->
		<?php include("./includes/navbar.php") ?>

		<!-- calling cart function -->
		<?php
		cart();
		?>

		<!-- third child -->
		<div class="p-2" style="color: #d3f1d4;">
			<h3 class="text-center" style="overflow: visible;">Leafy Realm</h3>
			<p class="text-center"><strong>Information about plants is equal to information about life</strong></p>
		</div>

		<!-- fourth child -->
		<div class="row px-1">
			<!-- Inside the row columns total space must be 12, you can divide it by any number with the summation of 12. -->

			<div class="col-md-10">
				<!-- products -->
				<div class="row">

					<!-- fetching products -->
					<?php
						// calling functions
						view_details();
						get_unique_category();
					?>
				</div>
			</div>
			<div class="col-md-2 p-0 mb-2" style="background-color: #75e475;">
				<!-- sidenav -->
				<!-- categories to be displayed -->
				<ul class="navbar-nav me-auto text-center">
					<li class="nav-item" style="background-color: #068127;">
						<a href="#" class="nav-link text-light" style="overflow: visible;"><p style="font-size: 30px; font-weight: bold;">Categories</p></a>
					</li>

					<!-- getting data from database -->
					<?php
					getcategories();
					?>
				</ul>
			</div>
		</div>

		<!-- last child -->
		<!-- include footer -->
		<?php include("./includes/footer.php") ?>
	</div>





	<!-- bootstrap js link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>