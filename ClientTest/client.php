<?php
$service_port = 10000;
$address = '127.0.0.1';

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
if ($socket === false) {
	echo "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n";
}

$result = socket_connect($socket, $address, $service_port);
if($result === false) {
	echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket)) . "\n";
}

$in = "I can play gutar ?\r\n";
$out = "";
socket_write($socket, $in, strlen($in));

while ($out = socket_read($socket, 8192)) {
	echo $out;
}
socket_close($socket);
