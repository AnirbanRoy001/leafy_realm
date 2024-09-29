<?php
	// Create Connection
	$con = mysqli_connect('localhost', 'root', '', 'leafy_realm');

	// Check Connection
	if(!$con){
		die(mysqli_error($con));
	}
?>