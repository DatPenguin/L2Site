<?php
	function get_data() {
		$file = fopen('data/etablissements_denseignement_superieur.csv', 'r+');

		if (isset($_SESSION['parsed']))
			return;
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

	function update_data() {
		$file = fopen('data/etablissements_denseignement_superieur.csv', 'r+');

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

	get_data();
?>