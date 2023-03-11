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
header("Access-Control-Allow-Origin: *");

include('config.php');
$username = $_POST['email'];
$password = $_POST['password'];

//to prevent from mysqli injection
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);
if (!isset($_POST['email'], $_POST["password"])) {
    exit("invalid");
}
// $sql = "select *from Users where email = '$username' and password = '$password'";
// $result = mysqli_prepare($con, $sql);
if ($row = $con->prepare("select password from Users where email = ? and password = ?")) {
	$row->bind_param("ss", $username, $password);
	$row->execute();
	$row->store_result();
	    if ($row->num_rows() > 0) {
        $row->bind_result($password);
        if($row->fetch()){
			// session_start();
                            
			// // // Store data in session variables
			// // $_SESSION["loggedin"] = true;
			// // $_SESSION["id"] = $id;
			// // $_SESSION["username"] = $username;                            
			
			// Redirect user to welcome page
			echo "logged in";
		}
		else{
			echo "invalid ";
		}
    }
}
else{
	echo "error";
}

// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
// $count = mysqli_num_rows($result);
$row->close();
$con->close();

// if ($count > 0) {
// 	echo "<h1><center> Login successful </center></h1>";
// } else {
// 	echo "<h1> Login failed. Invalid username or password.</h1>";
// }
?>