<?php

const ONION = "http://test.onion/";
const DEBUG = true;

/**
 * If user is using onion
 * @param $host
 * @return boolean
 */
function is_using_onion($host) {
	return $host == "127.0.0.1";
}

/**
 * Send the location header
 */
function redirect() {
	header("Location: " . ONION);
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

if (!is_using_onion($host) && in_array($host . "\n", $exits)) {
	redirect();
}

?>