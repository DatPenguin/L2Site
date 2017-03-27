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
	<body>\n\t\t<a href=\"index.php\"><img src=\"images/Banner.png\" class=\"banner\" alt=\"banner\" /></a>\n");
		include("menu.inc.php");
		echo "\n\t\t<div class=\"corps\">\n";
	}
?>

