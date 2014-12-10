<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="content">
<div id="main">
	<div id="navigation">
	</div>
	<div id="page">		
		<h2>Edit Logo</h2>
			<form action="edit_logo.php" method="post" enctype="multipart/form-data">
				<p>Title: 
					<input type="text" name="judul" value="">
				</p>
				<p>File:
					<input type="file" name="gambar">
				</p>
				<input type="submit" name="submit" value="Save Changes">
			</form>
		<a href="manage_content.php">Cancel</a>
	</div>
		
</div>