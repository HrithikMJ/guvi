<?php
header("Access-Control-Allow-Origin: *");
require 'vendor/autoload.php';
// ini_set('session.save_handler', 'redis');
// ini_set('session.save_path', 'tcp://localhost:6379?auth=123');

$servername = "localhost";
$username = "root";
$password = "root";
$db = "Profile";

$con = mysqli_connect($servername, $username, $password, $db);
if ($con->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
if (!$client = new MongoDB\Client("mongodb+srv://20ad13:Root@cluster0.ohkqkqc.mongodb.net/?retryWrites=true&w=majority")) {
    die("Error in Mongo");
}
$collection = $client->Profile->Users;


// $redis = new Redis();
// $redis->connect('localhost', 6379);
// $redis->auth('123');
// $redis->set("tutorial-name", "Redis tutorial"); 
// session_start();
// $count = isset($_SESSION['count']) ? $_SESSION['count'] : 1;

// echo $count;

// $_SESSION['count'] = ++$count;
?>