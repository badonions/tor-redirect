<?php

const ONION = "test.onion";
const DEBUG = true;

function redirect() {
	header("Location: " + ONION);
	exit();
}

$exits = file("list.txt");

/*
 * We do not actually want to detect localhost as an exit node
 * because all requests to your onion will show up as localhost,
 * so this is just for texting
 */
if (DEBUG) {
	$exits[] = "127.0.0.1";
	$exits[] = "::1";
}

$host = $_SERVER["REMOTE_ADDR"];

if (in_array($host, $exits)) {
	echo "Detected as exit node";
	exit();
}

?>