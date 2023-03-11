<?php

// $redis->set("tutorial-name", "Redis tutorial"); 
// phpinfo();
include("config.php");
// if (!$_SESSION["loggedin"]) {
//     exit("invalid ");
// }
// echo $_POST["email"];
// $updateResult = $collection->updateOne(
//     [ 'restaurant_id' => $_POST["email"] ],
//     [ '$set' => [ 'name' => 'Brunos on Astoria' ]]
//  );

$cursor = $collection->find([
    'email' => $_POST["email"],
]);


foreach ($cursor as $document) {
    echo json_encode(
        array(
            "name" => $document['name'],
            "dob" => $document['dob'],
            "age" => $document['age'],
            "phone" => $document['phone'],
        )
    );

}

?>