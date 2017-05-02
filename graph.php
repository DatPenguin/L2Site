<?php
	require_once("includes/parser.inc.php");
	require_once("includes/util.inc.php");
	require_once("includes/findmyschool.inc.php");
	include_once("includes/header.inc.php");
	create_header("Graphiques");
	@session_start();
?>
		<h1>Graphs</h1>
		<?php
			$tab = array();
			$tab = fillStringTab(17);
			print_r($tab);
			
			for($index = 0; $index < count($tab); $index++) {
				print("\n");
				print("\n" . $tab[$index] . " : " . countElementsFromData($tab[$index], 17));
			}

		?>
<?php
	include_once("includes/footer.inc.php");
?>
