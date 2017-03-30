<?php
	// Variable contenant les données parsées : $_SESSION['parsed']

	/**
	*	Parse le fichier pour la 1re utilisation
	*/
	function get_data() {
		@session_start();														// On démarre la session pour utiliser $_SESSION[]

		if (isset($_SESSION['parsed']))											// Si on a déjà parsé le fichier, on ne réitère pas l'opération
			return;

		$file = fopen('data/etablissements_denseignement_superieur.csv', 'r');	// Ouverture du fichier de données en lecture seule
		if (!$file) {															// Si l'ouverture du fichier a échoué, on affiche la page d'erreur et on exit()
			print_error_page();
			exit(1);
		}

		$_SESSION['parsed_headers'] = fgetcsv($file, 0, ';');					// On stocke les en-tête dans un tableau superglobal
		for ($i = 0; $i < 3659; $i++)											// On parcourt toutes les lignes du fichier et on les stocke dans un tableau
			$parsed[$i] = fgetcsv($file, 0, ';');
		$_SESSION['parsed'] = $parsed;											// On range le tableau dans une variable de session

		fclose($file);															// On ferme le fichier de données
	}

	/**
	*	Fonction affichant un message d'erreur si on ne peut pas ouvrir le fichier de données
	*/
	function print_error_page() {
		include_once("includes/header.inc.php");
		create_header("Erreur");
		echo "\t\t\t<h1>Erreur</h1>\n\t\t\t<p>Impossible d'ouvrir le fichier de données, veuillez vérifier qu'il est présent et non ouvert par un autre programme.</p>\n";
		include_once("includes/footer.inc.php");
	}

	@get_data(); // On démarre systématiquement le parsing à l'inclusion du fichier
?>