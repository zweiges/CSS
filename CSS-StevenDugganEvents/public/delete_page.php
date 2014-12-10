<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>

<?php find_selected_page(); ?>

<?php
 $current_page = find_page_by_id($_GET["page"]);
 if (!$current_page){
  redirect_to("manage_content.php");
 }
 
 $id = $current_page['id'];
 $query = "DELETE FROM pages WHERE id = {$id} LIMIT 1";
 $result = mysqli_query($koneksi, $query);
 		if ($result && mysqli_affected_rows($koneksi) == 1 ){
			// Success!
			$_SESSION["message"] = "Success delete";
			redirect_to("manage_content.php");
		} else {
			// Fail
			$_SESSION["message"] = "Fail delete";
			redirect_to("manage_content.php?page={$id}");
		}
?>