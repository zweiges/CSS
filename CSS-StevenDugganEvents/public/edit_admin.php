<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/function.php");?>
<?php require_once("../includes/validation_functions.php");?>
<?php
	$admin = find_admin_by_id($_GET['id']);
	if(!$admin){
		redirect_to("manage_admin.php");
	}
?>
<?php
	if(isset($_POST['submit'])){
		$id = $admin['id'];
		$username = mysql_prep($_POST['username']);
		$hashed_password = password_encrypt($_POST['password']);
		
		$required_fields = array("username","password");		
		validate_presences($required_fields);
		
		$fields_with_max_lengths = array("username" => 30);
		validate_max_lengths($fields_with_max_lengths);
		
		if(!empty($errors)){
			$_SESSION["errors"] = $errors;
			redirect_to("edit_admin.php?id=". urlencode($admin["id"]));
		}
		
		$sql = "UPDATE admins SET 
					username = '{$username}',
					hashed_password = '{$hashed_password}'
					WHERE id = {$id}
					LIMIT 1";
		$hasil = mysqli_query($koneksi, $sql);	
	} else{
		
	}
?>
<?php $layout_context = "admin"?>
<?php include("../includes/layouts/header.php");?>
		<div id="main">
			<div id="navigation">
			</div>
			<div id="page">
				<h2>Edit Admin: <?php echo htmlentities($admin["username"]); ?></h2>
				<form action="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>" method= "POST">
					<p>Username :
						<input type="text" name="username" value="<?php  echo htmlentities($admin["username"]); ?>" />
					</p>
					<p>Password :
						<input type="password" name="password"/>
					</p>
					<input type="submit" name="submit" value="Edit Admin"/>
				</form>
				</br>
				<a href="manage_admin.php">Cancel</a>
			</div>
		</div>
<?php	include("../includes/layouts/footer.php");?>