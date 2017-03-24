<?php
	function create_header($titre, $style = "styles") {
		printf("<!DOCTYPE html>
<html lang=\"fr\">
	<head>
		<title>" . "FindMySchool - " . $titre . "</title>
		<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/" . $style . ".css\" />
		<link rel=\"icon\" href=\"images/favicon.png\" />
		<meta http-equiv=\"Content-Type\" content=\"text/html;charset=utf-8\" />
	</head>
	<body>\n<a href=\"index.php\"><img src=\"images/Banner.png\" class=\"banner\" alt=\"banner\" /></a>");
		include("menu.inc.php");
		echo "<div class=\"corps\">";
	}
?>

