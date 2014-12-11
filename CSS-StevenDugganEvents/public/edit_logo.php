<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php 
if (isset($_POST['submit'])){
	$judul = mysql_prep($_POST['judul']);
	 
	$file_name = $_FILES['gambar']['name'];
	$file_size = $_FILES['gambar']['size'];
	$file_tmp  = $_FILES['gambar']['tmp_name'];

	$file_ext = strtolower(end(explode(".", $file_name)));
	$ext_boleh = array("jpg", "jpeg", "png", "gif", "bmp");
	
	if(empty($errors)){
		if(in_array($file_ext, $ext_boleh)){
		  if($file_size <= 2*1024*1024){
			$sumber = $file_tmp;
			$tujuan = "images/" . $file_name;
			//Writes the photo to the server 
                        if(move_uploaded_file($file_tmp, $tujuan)) 
                          { 
                            echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded, and your information has been added to the directory"; 
                          } 
                            else { 
 
 //Gives and error if its not 
 echo "Sorry, there was a problem uploading your file."; } 
			$sql = "INSERT INTO logo(title, gambar) 
					VALUES ('$judul', '$tujuan')";
			$result = mysqli_query($koneksi, $sql);
			if ($result) {
			// Success!
			$_SESSION["message"] = "Success change logo";
			redirect_to("manage_content.php");
			} else {
				// Fail
				$_SESSION["message"] = "Fail change logo";
			}
			if(mysqli_error($koneksi)){
			 echo "Upload gambar gagal.";
			 echo mysqli_error($koneksi);
			 die();
			}
			redirect_to("manage_content.php");
		  }else {
		   echo "MAX 2MB cin";
		  }
		}else {
		 echo "cuman gambar cin!";
		}
 }
}
?>
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