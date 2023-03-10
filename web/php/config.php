<?php 	
	$servername = "localhost";
    $username = "root";
    $password = "root";
    $db = "Profile";
    $con = mysqli_connect($servername, $username, $password, $db);
    if ($con->connect_error) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
