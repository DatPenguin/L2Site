<?php
	require_once("includes/util.inc.php");
	require_once("includes/parser.inc.php");
	include_once("includes/header.inc.php");
	create_header("Tri par ville");
?>
		<h1>Tri par ville</h1>
		<?php
			include("includes/standard_form.inc.php");
			find_my_school(11);
		?>
<?php
	include_once("includes/footer.inc.php");
?>