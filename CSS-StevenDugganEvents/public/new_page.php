<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>


<?php find_selected_page(); ?>
<?php
  if (!$current_subject) {
	redirect_to("manage_content.php");
  }
?>

<?php
	if (isset($_POST['submit'])) { 
	//validation
	$required_field = array("menu_name", "position", "visible", "content");
	validate_presences($required_field);
	 
	$fields_with_max_lengths = array("menu_name" => 30);
	validate_max_lengths($fields_with_max_lengths);

	if(empty($errors)) {
		$subject_id = $current_subject["id"];
		$menu_name = mysql_prep($_POST['menu_name']);
		$position = mysql_prep($_POST['position']);
		$visible = mysql_prep($_POST['visible']);
		$content = mysql_prep($_POST['content']);
		
		$query  = "INSERT INTO pages (";
		$query .= "subject_id, menu_name, position, visible, descon";
		$query .= ") VALUES (";
		$query .= "'{$subject_id}', '{$menu_name}', '{$position}', '{$visible}', '{$content}'";
		$query .= ")";
		$result = mysqli_query($koneksi, $query);
		if ($result) {
			// Success!
			$_SESSION["message"] = "Success created";
			redirect_to("manage_content.php?subject=". urlencode($current_subject["id"]));
		} else {
			// Fail
			$_SESSION["message"] = "Fail created";
		}
	}
}		
?>
<?php include("../includes/layouts/header.php"); ?>
		<div id="main">
			<div id="navigation">
				 <?php echo navigation($current_subject, $current_page); ?> 
			</div>
			<div id="page">
				<h2>Create Page</h2>
				<form action="new_page.php?subject=<?php echo urlencode($current_subject['id']); ?>" method="post">
					<p>Menu name: 
						<input type="text" name="menu_name" value="" />
					</p>
					<p>Position: 
						<select name="position">
						<?php
							$page_set = find_pages_for_subject($current_subject["id"]);
							$page_count = mysqli_num_rows($page_set);
							for ($count=1; $count <= ($page_count + 1); $count++) {
								echo "<option value=\"{$count}\">{$count}</option>";
							}
						?>					
						</select>
					</p>
					<p>Visible: 
						<input type="radio" name="visible" value="0" /> No
						&nbsp;
						<input type="radio" name="visible" value="1" /> Yes
					</p>
					<p>Content:<br>
						<textarea name="content"></textarea>
					</p>
					<input type="submit" name="submit" value="Create Page" />
				</form>
				<br>
				<a href="manage_content.php?subject=<?php echo urlencode($current_subject["id"]); ?>">Cancel</a>	
			</div>
		</div>
<?php include("../includes/layouts/footer.php"); ?>