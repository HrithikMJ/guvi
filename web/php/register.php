<?php
header("Access-Control-Allow-Origin: *");

$redis = new Redis();
$redis->connect('localhost',6379);
$redis->auth('123');

echo "hello". htmlspecialchars($_POST["name"]) . '!';

?>