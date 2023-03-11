<?php
header("Access-Control-Allow-Origin: *");
include('config.php');

$redis = new Redis();
$redis->connect('localhost', 6379);
$redis->auth('123');
$username = $_POST['email'];
$password = $_POST['password'];

ini_set('session.save_handler', 'redis');
ini_set('session.save_path', 'tcp://localhost:6379?auth=123');
session_start();

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

if ($_SESSION["loggedin"]) {
	echo "logged in ";
}

if (!isset($_POST['email'], $_POST["password"])) {
	exit("invalid");
}

if ($row = $con->prepare("select password from Users where email = ? and password = ?")) {
	$row->bind_param("ss", $username, $password);
	$row->execute();
	$row->store_result();
	if ($row->num_rows() > 0) {
		$row->bind_result($password);
		if ($row->fetch()) {


			$_SESSION["loggedin"] = true;
			$_SESSION["email"] = $username;
			$redis->set('session:' . session_id(), serialize($_SESSION));

			echo json_encode(
				array(
					"loggedin" => $_SESSION["loggedin"],
					"email" => $_SESSION["email"],
				)
			);
		} else {
			echo "invalid ";
			session_unset();
			session_destroy();
		}
	}
} else {
	echo "error";
}


$row->close();
$con->close();


?>