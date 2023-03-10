<?php
$redis = new Redis();
$redis->connect('localhost', 6379);
$redis->auth('123');
$redis->set("tutorial-name", "Redis tutorial"); 
// $redis->set("tutorial-name", "Redis tutorial"); 
echo "Stored string in redis::" .$redis->get("tutorial-name"); 
?>