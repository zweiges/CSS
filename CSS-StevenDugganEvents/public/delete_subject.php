<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>

<?php find_selected_page(); ?>

<?php
 $current_subject = find_subject_by_id($_GET["subject"], false);
 if (!$current_subject){
  redirect_to("manage_content.php");
 }
 
 $pages_set = find_pages_for_subject($current_subject["id"]);
 if (mysqli_num_rows($pages_set) > 0){
	$_SESSION["message"] = "Can't delete a subject with pages.";
	redirect_to("manage_content.php?subject={$current_subject["id"]}");
 }
 $id = $current_subject['id'];
 $query = "DELETE FROM subjects WHERE id = {$id} LIMIT 1";
 $result = mysqli_query($koneksi, $query);
 		if ($result && mysqli_affected_rows($koneksi) == 1 ){
			// Success!
			$_SESSION["message"] = "Success updated";
			redirect_to("manage_content.php");
		} else {
			// Fail
			$_SESSION["message"] = "Fail update";
			redirect_to("manage_content.php?subject={$id}");
		}
?>