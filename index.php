<?php

include('server.php');

$server_relay = 1;
$server_ip = "127.0.0.1";
$server = new Server($server_ip,$server_relay);

$server->up_Server();
$server->down_Server();
$server->reload_Server();
$server->ping();

?>