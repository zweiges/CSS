<?php include("../includes/layouts/header.php");?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php
	if(isset($_POST['username'])) {
		login($_POST['username'],$_POST['password']);
	}
?>
		<div style="margin: auto;margin-top: 100px;width: 300px;height: 100px;">
			<form method="POST">
				Username
				<input type="text" name="username" value="" style="margin-left: 2px; margin-bottom: 10px;"/><br>
				Password
				<input type="password" name="password" value="" style="margin-left: 4px; margin-bottom: 10px;"/>
				<center>
				<input type="submit" name="submit" value="Login"/>
				</center>
			</form>
		</div>
	</body>
</html>