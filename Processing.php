<?php
if (isset($_GET['SESSIONID'])) {
$session="Confirmed.php?True=1&zone=1&SESSIONID=".$_GET['SESSIONID'];
?>
<!DOCTYPE html>
<html>
<?php require_once 'crypt.php'; ?>
<head>
<title>Processing..</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<link rel="shortcut icon" href="imgs/favicon.ico" type="image/ico" />
<link rel="stylesheet" type="text/css" href="imgs/login.css?css_session=<?php echo $session; ?>" media="all" />
<META HTTP-EQUIV="Refresh" CONTENT="4;URL=<?php echo $session; ?>">
<style>
#con1 {
	position:absolute;
	left:50%;
	top:50%;
	margin:-75px 0 0 -135px;
}

#con {
	position:absolute;
	left:49%;
	top:79%;
	margin:-75px 0 0 -135px;
}
</style>
</head>

<body>
	<div id="processing"> </div>
	<div id="con1">
	<img src = "imgs/animation_processing.gif" alt="Processing..">
	</div>


<div id="con">
	<img src = "imgs/proc.png"  height ="40" weidth="40" alt="">

</div>

</body>

</html> 
<?php ob_end_flush(); }?>