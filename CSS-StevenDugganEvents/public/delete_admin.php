<?php require_once("../includes/db_connection.php");?>
<?php require_once("../includes/function.php");?>
<?php
//jika id admin tidak ditemukan kembali ke halaman manage_admin
$admin = find_admin_by_id($_GET['id']);
	if(!$admin){
		redirect_to("manage_admin.php");
	}
?>
<?php
//query untuk menghapus admin yang ada
	$id = $admin["id"];
	$sql = "DELETE FROM admins
					WHERE id = '{$id}'
					LIMIT 1";
	$hasil = mysqli_query($koneksi,$sql);
	
	if($hasil && mysqli_affected_rows($koneksi) == 1){
		//SUCCESS
		$_SESSION["message"] = "Admin deleted.";
		redirect_to("manage_admin.php");
	} else{
		//FAILURE
		$_SESSION["message"] = "Admin deletion failed.";
		redirect_to("manage_admin.php");
	}
?>