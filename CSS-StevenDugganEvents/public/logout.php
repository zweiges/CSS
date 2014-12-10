<?php require_once("../includes/function.php");?>
<?php
	$_SESSION['admin'] = null;
	$_SESSION['username'] = null;
	redirect_to("login.php");
?>