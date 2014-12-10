<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/function.php"); ?>
<?php include("../includes/layouts/header.php"); ?>
<?php find_selected_page(true); ?>
		<div id="main">
			<div id="navigation">
				<?php echo public_navigation($current_subject, $current_page); ?> <br>
			</div>
			<div id="page">
				<?php if ($current_page) {?>
				  <div class="view-content">
				  <h2><?php echo ($current_page["menu_name"]); ?></h2>
				   <?php echo nl2br(($current_page['descon'])); ?><br />
				  </div><br><br>
				<?php } else {?>
				 <p>Welcome!</p>
				<?php }?>	
			</div>
		</div>
<?php include("../includes/layouts/footer.php"); ?>