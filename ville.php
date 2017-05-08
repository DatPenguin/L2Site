<?php
	require_once("includes/parser.inc.php");
	@get_data();
	require_once("includes/util.inc.php");
	require_once("includes/findmyschool.inc.php");
	include_once("includes/header.inc.php");
	create_header("Tri par ville");
	@session_start();
?>
	<h1>Tri par ville</h1>
	<?php
		print_list2($_SESSION['parsed'], 11);
		find_my_school(11);
	?>
<?php
	include_once("includes/footer.inc.php");
?>