<?php
	require_once("includes/parser.inc.php");
	@get_data();
	require_once("includes/util.inc.php");
	require_once("includes/findmyschool.inc.php");
	include_once("includes/header.inc.php");
	create_header("Tri par académie");
	@session_start();
?>
	<h1>Tri par académie</h1>
	<?php
		print_list2($_SESSION['parsed'], 17);
		find_my_school(17);
	?>
<?php
	include_once("includes/footer.inc.php");
?>