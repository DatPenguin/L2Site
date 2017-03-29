<?php
	require_once("includes/parser.inc.php");
	require_once("includes/findmyschool.inc.php");
	include_once("includes/header.inc.php");
	create_header("Tri par type");
?>
		<h1>Tri par type</h1>
		<?php
			include("includes/standard_form.inc.php");
			find_my_school(2);
		?>
<?php
	include_once("includes/footer.inc.php");
?>