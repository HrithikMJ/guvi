<?php
session_start();
header("Access-Control-Allow-Origin: *");

include("config.php");

$email = $_POST["email"];
// $cursor = $collection->find([
//     'email' => $email,
// ]);
echo $_SESSION["email"];
if (
    $updateResult = $collection->updateOne(
        ['email' => $email],
        [
            '$set' => [
                'name' => $_POST["name"],
                'dob' => $_POST["dob"],
                'age' => $_POST["age"],
                'phone' => $_POST["phone"],
            ]
        ]
    )
) {
    echo true;
}

?>