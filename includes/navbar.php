<!-- first child -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #c2f1c3;">
    <div class="container-fluid">
	    <img src="./images/logo.png" alt="" class="logo">
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    	<span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      	<ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="display_all.php">All Plants</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="care_info.php">Plant Care</a>
		        </li>
		        <?php
					if(isset($_SESSION['username'])){
						echo "<li class='nav-item'>
		          <a class='nav-link' href='./users_area/profile.php'>My Account</a>
		        </li>";
					} else {
						echo "<li class='nav-item'>
		          <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
		        </li>";
					}
				?>
		        <li class="nav-item">
		          <a class="nav-link" href="#contact_info">Contact</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link">Total Price: <?php echo total_cart_price(); ?>/-</a>
		        </li>
	      	</ul>
	      	<form class="d-flex" action="search_plant.php" method="get">
	        	<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
		        <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_plant" style="color: black;">
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