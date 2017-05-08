<?php
	require_once("includes/parser.inc.php");
	@get_data();
	require_once("includes/util.inc.php");
	require_once("includes/findmyschool.inc.php");
	include_once("includes/header.inc.php");
	create_header("Tri par région");
	@session_start();
?>
	<h1>Tri par région</h1>
	<?php
		print_list2($_SESSION['parsed'], 18);
		find_my_school(18);
	?>
<?php
	include_once("includes/footer.inc.php");
?>