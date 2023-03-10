<?php
header("Access-Control-Allow-Origin: *");
$servername = "localhost";
$username = "root";
$password = "root";
$db="Profile";
$conn =  mysqli_connect($servername, $username, $password,$db);
if ($conn->connect_error) {
    die("Connection failed: " .mysqli_connect_error());
  }
$redis = new Redis();
$redis->connect('localhost',6379);
$redis->auth('123');
// $has="hello";
// echo "hello";
if($qry = $conn->prepare('INSERT into Users values (?,?)')){
    $qry -> bind_param('ss',$_POST["email"],$_POST["password"]);
    $qry -> execute();
    // $qry -> store_result();
};
if(function_exists($_GET['f'])) {
    $_GET['f']();
 }
function register(){
    // if ( !isset($_POST['email'],$_POST["password"])){
    //     exit("invalid");
    // }
    // if ($qry = $conn->prepare('SELECT password FROM users where username=?')){
    //     $qry -> bind_param('s',$_POST["email"]);
    //     $qry -> execute();
    //     $qry -> store_result();
    //     if ( $qry -> num_rows >0){
    //         $qry -> bind_result($password);
    //         $qry -> fetch();
    //     }
    if($qry = $conn->prepare('INSERT into Users values (?,?)')){
        $qry -> bind_param('ss',$_POST["email"],$_POST["password"]);
        $qry -> execute();
        $qry -> store_result();
    };
    }

echo "hello". htmlspecialchars($_POST["email"]) . '!';
?>