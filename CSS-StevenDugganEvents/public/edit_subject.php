<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>
<?php find_selected_page(); ?>
<?php 
if (isset($_POST['submit'])){

	
	$required_fields = array("menu_name", "position", "visible");
	validate_presences($required_fields);
	
	$fields_with_max_lengths = array("menu_name" => 30);
	validate_max_lengths($fields_with_max_lengths);
	
	if(empty($errors)){
		$id = $current_subject['id'];
		$menu_name = mysql_prep($_POST['menu_name']);
		$position = mysql_prep($_POST['position']);
		$visible = mysql_prep($_POST['visible']);
		
		$query  = "UPDATE subjects SET ";
		$query .= "menu_name = '{$menu_name}', ";
		$query .= "position = {$position}, ";
		$query .= "visible = {$visible} ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1;";
		$result = mysqli_query($koneksi, $query);
		
		if ($result && mysqli_affected_rows($koneksi) >= 0 ){
			// Success!
			$_SESSION["message"] = "Success updated";
			redirect_to("manage_content.php");
		} else {
			// Fail
			$message = "Fail update";
			redirect_to("edit_subject.php");
		}
	 
	} 
	

}else {

}// end isset post
?>

<?php
 if (!$current_subject){
  redirect_to("manage_content.php");
 }
?>
<?php $layout_context = "admin";?>
<?php include("../includes/layouts/header.php"); ?>

		<div id="main">
			<div id="navigation">
				 <?php echo navigation($current_subject, $current_page); ?> 
			</div>
			<div id="page">
				<h2>Edit Subject: <?php echo htmlentities($current_subject["menu_name"]) ?></h2>
				<form action="edit_subject.php?subject=<?php echo urlencode($current_subject["id"]) ?>" method="post">
					<p>Menu name: 
						<input type="text" name="menu_name" value="<?php echo htmlentities($current_subject["menu_name"]) ?>" />
					</p>
					<p>Position: 
						<select name="position">
						<?php
						 $subject_set = find_all_subjects(false);
						 $subject_count = mysqli_num_rows($subject_set);
						for ($count=1; $count <= $subject_count; $count++){
						 echo "<option value=\"{$count}\"";
						 if ($current_subject["position"] == $count){
						  echo " selected";
						 }
						 echo ">{$count}</option>";
						}?>					
						</select>
					</p>
					<p>Visible: 
						<input type="radio" name="visible" value="0" <?php if ($current_subject["visible"] == 0) {echo "checked";}?>/> No
						&nbsp;
						<input type="radio" name="visible" value="1" <?php if ($current_subject["visible"] == 1) {echo "checked";}?>/> Yes
					</p>
					<input type="submit" name="submit" value="Edit Subject" />
				</form>
				<br />
				<a href="manage_content.php">Cancel</a>	
				&nbsp;
				<a href="delete_subject.php?subject=<?php echo urlencode($current_subject["id"]) ?>" onclick="return confirm('Are You Sure?');">Delete</a>	
			</div>
		</div>
<?php include("../includes/layouts/footer.php"); ?>