<?php
function microtime_float()
{
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
}
$time_start = microtime_float();

define('APPENV', 'frontend');
require '../settings.php';

$time_end = microtime_float();
$time = round(($time_end - $time_start) * 10000) / 10000;
echo "<p align='center'>$time seconds</p>";