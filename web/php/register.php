<?php
header("Access-Control-Allow-Origin: *");
define("SITE_ROOT", __DIR__);
include('config.php');

$username = trim($_POST["email"]);
$password = $_POST["password"];
$name = $_POST["name"];
$age = $_POST["age"];
$phone = $_POST["phone"];
$dob = $_POST["dob"];

$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);

$sql = "SELECT * FROM Users WHERE email = ?";
$qry = mysqli_prepare($con, $sql);
if ($qry) {
    mysqli_stmt_bind_param($qry, "s", $username);
    if (mysqli_stmt_execute($qry)) {
        mysqli_stmt_store_result($qry);

        if (mysqli_stmt_num_rows($qry) == 1) {
            exit("This email is already taken");
        }
    } else {
        exit("error");
    }
    mysqli_stmt_close($qry);

}

if ($qry = $con->prepare('INSERT into Users values (?,?)')) {
    $qry->bind_param('ss', $username, $password);

    if (
        $qry->execute() && $insertOneResult = $collection->insertOne([
            'name' => $name,
            'email' => $username,
            'age' => $age,
            'phone' => $phone,
            'dob' => $dob,

        ])
    ) {
     

        echo "Successfully Registered with email:" . htmlspecialchars($username) . "!";
    } else {
        echo "error";
    }
    // $qry->store_result();
}

mysqli_close($con);

?>