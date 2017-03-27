<?php
	@session_start();
	function get_data() {
		$file = fopen('data/etablissements_denseignement_superieur.csv', 'r+');
		if (!$file) {
			print_error_page();
			exit(1);
		}

		if (isset($_SESSION['parsed']))
			return;
		$_SESSION['parsed_headers'] = fgetcsv($file, 0, ';');
		for ($i = 0; $i < 3659; $i++)
			$parsed[$i] = fgetcsv($file, 0, ';');
		$_SESSION['parsed'] = $parsed;
		fclose($file);
	}

	function print_error_page() {
		include_once("includes/header.inc.php");
		create_header("Erreur");
		echo "\t\t\t<h1>Erreur</h1>\n\t\t\t<p>Impossible d'ouvrir le fichier de données, veuillez vérifier qu'il est présent et non ouvert par un autre programme.</p>\n";
		include_once("includes/footer.inc.php");
	}

	function update_data() {
		$file = fopen('data/etablissements_denseignement_superieur.csv', 'r+');
		if (!$file) {
			print_error_page();
			exit(1);
		}

		$_SESSION['parsed_headers'] = fgetcsv($file, 0, ';');
		for ($i = 0; $i < 3659; $i++)
			$parsed[$i] = fgetcsv($file, 0, ';');
		$_SESSION['parsed'] = $parsed;
		fclose($file);

		foreach ($_SESSION['parsed'] as $key => $row)
					for ($i = 0; $i < 26; $i++)
						$tab[$i][$key] = $row[$i];

				array_multisort($tab[17], SORT_ASC, $_SESSION['parsed']);
	}

	@get_data();
?>