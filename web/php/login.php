<?php
// if (!isset($_POST['email'], $_POST["password"])) {
//     exit("invalid");
// }
// if ($qry = $conn->prepare('SELECT password FROM users where username=?')) {
//     $qry->bind_param('s', $_POST["email"]);
//     $qry->execute();
//     $qry->store_result();
//     if ($qry->num_rows > 0) {
//         $qry->bind_result($password);
//         $qry->fetch();
//     }
// } 
	include('config.php');
	$username = $_POST['email'];
	$password = $_POST['password'];
	
		//to prevent from mysqli injection
		$username = stripcslashes($username);
		$password = stripcslashes($password);
		$username = mysqli_real_escape_string($con, $username);
		$password = mysqli_real_escape_string($con, $password);
	
		$sql = "select *from login where username = '$username' and password = '$password'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$count = mysqli_num_rows($result);
		
		if($count == 1){
			echo "<h1><center> Login successful </center></h1>";
		}
		else{
			echo "<h1> Login failed. Invalid username or password.</h1>";
		}	
        
?>