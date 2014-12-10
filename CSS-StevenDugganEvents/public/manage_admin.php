<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/function.php");?>
<?php $admin_set = find_all_admins();?>
<?php	include("../includes/layouts/header.php");?>
<div id="main">
	<div id="navigation"></div>
	<div id="page">
		<h2>Manage Admin</h2>
		<table>
			<tr>
				<th style="text-align:left; width:200px;">Username</th>
				<th colspan="2" style="text-align:left;">Actions</th>
			</tr>
			<?php while($admin = mysqli_fetch_assoc($admin_set)){?>
				<tr>
					<td><?php echo htmlentities($admin["username"]); ?><br>
					 <?php echo htmlentities($admin["hashed_password"]); ?>
					</td>
					<td><a href="edit_admin.php?id=<?php echo urlencode($admin["id"]); ?>">Edit</a></td>
					<td><a href="delete_admin.php?id=<?php echo urlencode($admin["id"]); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
				</tr>
			<?php } ?>
		</table>
		<br>
			<a href="new_admin.php">Add new admin</a>
			<hr />
			<?php 
			 $password = "admin";
			 $hash_format = "$2a$10$";
			 $salt = "Salt22CharacterOrMoree";
			 echo "Length: ". strlen($salt);
			 $format_and_salt = $hash_format . $salt;
			 $hash = crypt($password, $format_and_salt);
			 echo "<br>";
			 echo $hash;
			 
			 $hash2 = crypt("secret", $hash);
			 echo "<br>";
			 echo $hash2;
			?>
	</div>
</div>
<?php include("../includes/layouts/footer.php");?>