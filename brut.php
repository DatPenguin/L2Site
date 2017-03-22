<?php
	require_once("includes/parser.inc.php");
	include_once("includes/header.inc.php");
	create_header("Données brutes");
?>
		<h1>Données brutes</h1>
		<p>
			<?php
				print_r($_SESSION['parsed'][1]);
			?>
		</p>
<?php
	include_once("includes/footer.inc.php");
?>