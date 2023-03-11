<?php
header("Access-Control-Allow-Origin: *");
include('config.php');
 
$_SESSION = array();
session_destroy();
exit("logged out");

?>