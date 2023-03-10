<?php
header("Access-Control-Allow-Origin: *");
define("SITE_ROOT", __DIR__);
include('config.php');

// $mongodbDatabase = 'Users';
// $mongodbCollection = 'Profile';
// $serverApi = new MongoDB\Driver\ServerApi(\MongoDB\Driver\ServerApi::V1);
// $client = new MongoDB\Driver\Manager(
//     'mongodb+srv://20ad13:Root@cluster0.ohkqkqc.mongodb.net/?retryWrites=true&w=majority',
//     [],
//     ['serverApi' => $serverApi]
// );
// $dbname = "Profile";
// $command = new MongoDB\Driver\Command(["listCollections" => 1]);
// $cursor = $client->executeCommand($dbname, $command);
// $database = $client->{$dbname};
// $collection = $client->{$mongodbDatabase}->{$mongodbCollection};
// echo "Collection  created successfully.";

// if (function_exists($_GET['f'])) {
//     $_GET['f']();
// }
if ($qry = $con->prepare('INSERT into Users values (?,?)')) {
    $qry->bind_param('ss', $_POST["email"], $_POST["password"]);
    $qry->execute();
    $qry->store_result();
}
;


echo "hello" . htmlspecialchars($_POST["email"]) . '!';
?>