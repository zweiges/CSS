<?php require_once("../includes/function.php"); //memanggil file file penyimpanan fungsi?>
<?php confirm_logged_in(); /*untuk memastikan user sudah login*/?>
<?php include("../includes/layouts/header.php"); //memanggil header.php yang menyimpan kode untuk memulai setiap halaman?>
	<div id="main">
		<div id="navigation">
		</div>
		<div id="page">
			<h2>Admin Menu</h2>
			<p>Welcome to the admin area</p>
			<ul>
			  <li><a href="manage_content.php">Manage Website Content</a></li>
			  <li><a href="manage_admin.php">Manage Admin Users</a></li>
			  <li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
<?php include("../includes/layouts/footer.php");//memanggil footer.php yang menyimpan kode footer setiap halaman ?>	