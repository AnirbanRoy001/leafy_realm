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
		<?php if(!isset($_GET['category_id'])){ ?>
			<div class="px-5 m-auto" style="color: #d3f1d4;">
				<p>Plants are essential to life on Earth, providing numerous environmental, health, and aesthetic benefits that enrich our world. Whether it's through their ability to purify the air or their role in maintaining the balance of ecosystems, plants are at the heart of our planet's health. Understanding their importance and caring for them properly ensures a healthier, more vibrant environment for all.<br><br>
				Plants are the lifeblood of our planet, offering countless benefits that enhance both nature and human life. They purify the air we breathe by producing oxygen and absorbing carbon dioxide, helping to combat climate change. Plants support biodiversity, providing food and shelter for wildlife while also enriching our lives with their beauty. Indoors, they act as natural air purifiers, creating healthier spaces. Caring for plants ensures they thrive, sustaining ecosystems, improving air quality, and bringing tranquility to our surroundings.</p>

				<p class="text-center" style="color: #d3f1d4;">
				<p class="text-center"><strong>The Importance of Plant Care</strong></p><p>
				Caring for plants is essential to their health and longevity, allowing them to thrive and continue enriching our lives. Proper plant care ensures cleaner air, vibrant growth, and sustainable ecosystems. By nurturing plants, we not only enhance their beauty but also create a healthier, more balanced environment for ourselves and future generations.
				Caring for plants involves addressing several key factors to ensure their health and growth:<br>

				<br><strong>Leaf Care:</strong> Regularly check for pests and diseases. Gently clean leaves with a damp cloth to remove dust and promote better photosynthesis.
				<br><strong>Temperature:</strong> Maintain a stable temperature suited to the plant species, avoiding extremes. Most indoor plants thrive in temperatures between 60-75°F (15-24°C).
				<br><strong>Soil Quality:</strong> Use well-draining soil and ensure it’s rich in nutrients. Avoid waterlogging by providing proper drainage and refreshing the soil as needed.
				<br><strong>Placement:</strong> Position plants according to their light needs—some require direct sunlight, while others thrive in low-light conditions. Rotate plants periodically for even growth.
				<br><strong>Humidity:</strong> Ensure adequate humidity for your plants, especially in dry environments. Use a humidifier or place plants on a pebble tray with water to maintain optimal moisture levels.<br><br>
				By paying attention to these aspects, you can create a thriving environment that supports robust plant growth and beauty.</p>
				<br><br><br>
				<p class="text-center" style="color: white; font-size: 1.7em;"><strong>Some of Our Vast Indoor Collection</strong></p>
			</div> 
		<?php } ?>
	}

		<!-- fourth child -->
		<div class="row px-1">
			<!-- Inside the row columns total space must be 12, you can divide it by any number with the summation of 12. -->

			<div class="col-md-10">
				<!-- products -->
				<div class="row">
					<?php
						getplants();
						get_unique_category();
						// $ip = getIPAddress();  
						// echo 'User Real IP Address - '.$ip;
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
		<div class="mt-5"></div>

		<!-- last child -->
		<!-- include footer -->
		<?php include("./includes/footer.php") ?>
	</div>





	<!-- bootstrap js link -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>