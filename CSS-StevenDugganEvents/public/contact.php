<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 
if (isset($_POST['submit'])){
	$nama = mysql_prep($_POST['nama']);
	$email = mysql_prep($_POST['email']);
	$event = mysql_prep($_POST['event']);
	$desk = mysql_prep($_POST['desk']);
	
	$required_fields = array("nama", "email", "event", "desk");
	validate_presences($required_fields);
	
	$fields_with_max_lengths = array("nama" => 30);
	validate_max_lengths($fields_with_max_lengths);
	
	$query  = "INSERT INTO contact(";
	$query .= "nama, email, event, desk";
	$query .= ") VALUES (";
	$query .= " '{$nama}', '{$email}', '{$event}', '{$desk}'";
	$query .= ")";
	$result = mysqli_query($koneksi, $query);
	
	if ($result) {
		echo "<script type='text/javascript'>";
		echo "window.alert('My name is George. Welcome!')";
		echo "</script>";
		redirect_to("index.php");
	} else {
		redirect_to("contact.php");
		die();
	}

}else {
 redirect_to("index.php");
}
?>

<?php 
	if(isset($koneksi)){ mysqli_close($koneksi); }
?>