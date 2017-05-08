<?php
	require_once("includes/util.inc.php");

	/**
	*	Fonction d'affichage des résultats en fonction des critères sélectionnés
	*	Arguments:
	*	$n: Colonne selon laquelle trier (par défaut 17 = Académie)
	*	$page: page à afficher
	*/
	function find_my_school($n = 17, $page = 0) {
		if (isset($_GET['page']))					// Si une page est spécifiée dans l'URL ($_GET), alors on affichera celle-ci
			$page = $_GET['page'];


		if (isset($_POST['liste'])) {				// Si on a spécifié un critère de tri dans le menu déroulant, alors on reset la page
			$_SESSION['liste'] = $_POST['liste'];
			$page = 0;
			$reset = true;
		}
		else
			$reset = false;							// Sinon, on initialise $reset à false

		if ($page == 49.3) {						// Easter egg
			echo "<img src=\"images/manu.jpg\" style=\"display: block; margin: auto;\" alt=\"manu\" />";
			return;
		}

		$toprint = array();
		foreach ($_SESSION['parsed'] as $key => $row)		// Inversion des lignes et des colonnes pour trier avec array_multisort()
						for ($i = 0; $i < 26; $i++)
							$tab[$i][$key] = $row[$i];

		array_multisort($tab[$n], SORT_ASC, $_SESSION['parsed']);	// On trie avec array_multisort() en fonction de la colonne envoyée en paramètre

		for ($i = 1; $i < count($_SESSION['parsed']); $i++)	// On parcourt tout le tableau parsé et on met en page chaque ligne
			if ((isset($_SESSION['liste']) && ($_SESSION['liste'] == $_SESSION['parsed'][$i][$n] || $_SESSION['liste'] == "tout")) && (isset($_GET['page']) || isset($_POST['liste'])))
					$toprint[] = get_tabled_parsed($_SESSION['parsed'][$i]);

		print_pages($toprint, $reset);				// On affiche une première fois les pages, avant les résultats

		if ($reset || isset($_GET['page']))
			print_headers();
		for ($i = 0; $i < 10; $i++)					// On affiche tous les résultats de la page actuelle
			if (isset($toprint[$i + $page * 10])) {
				echo $toprint[$i + $page * 10];
			}

		print_pages($toprint, $reset);				// On affiche une seconde fois les pages, après les résultats
	}

	/**
	*	Fonction de recherche avancée
	*/
	function find_my_school_advance() {
		$type = "non";		// Initialisation par défaut

		if (isset($_COOKIE['findmyschoolacademie']))	// Si le cookie est défini, on set $type sur "cookie"
			$type = "cookie";
		if (isset($_POST['academie']))					// Idem avec le post, mais celui-ci est prioritaire sur le cookie
			$type = "post";

		if ($type == "non")								// Si $type a encore sa valeur par défaut, on return car on ne doit rien afficher
			return;

		foreach ($_SESSION['parsed'] as $key => $row)	// Idem que fonction précédente
						for ($i = 0; $i < 26; $i++)
							$tab[$i][$key] = $row[$i];

		array_multisort($tab[17], SORT_ASC, $_SESSION['parsed']);

		// On différencie ici le tri selon cookie et selon post

		if ($type == "post") {
			for ($i = 1; $i < 3659; $i++) {
				if (((isset($_POST['nom'])) && $_POST['nom'] != "") && 	// On n'affiche un établissement que s'il correspond à tous les critères spécifiés par l'utilisateur
					(strpos($_SESSION['parsed'][$i][3], $_POST['nom']) !== false) && 
					(($_POST['academie'] == "tout") || ($_POST['academie'] == $_SESSION['parsed'][$i][17])) && 
					(($_POST['region'] == "tout") || ($_POST['region'] == $_SESSION['parsed'][$i][18])) && 
					(($_POST['ville'] == "tout") || ($_POST['ville'] == $_SESSION['parsed'][$i][11])) && 
					(($_POST['type'] == "tout") || ($_POST['type'] == $_SESSION['parsed'][$i][2])))
					echo get_tabled_parsed($_SESSION['parsed'][$i]);
				else if (isset($_POST['nom']) && $_POST['nom'] == "") {
					if ((($_POST['academie'] == "tout") || ($_POST['academie'] == $_SESSION['parsed'][$i][17])) && 
					(($_POST['region'] == "tout") || ($_POST['region'] == $_SESSION['parsed'][$i][18])) && 
					(($_POST['ville'] == "tout") || ($_POST['ville'] == $_SESSION['parsed'][$i][11])) && 
					(($_POST['type'] == "tout") || ($_POST['type'] == $_SESSION['parsed'][$i][2])))
					echo get_tabled_parsed($_SESSION['parsed'][$i]);
				}
			}
		}
		else if ($type == "cookie") {
			for ($i = 1; $i < 3659; $i++) {
				if (((isset($_COOKIE['findmyschoolnom'])) && $_COOKIE['findmyschoolnom'] != "") && 
					(strpos($_SESSION['parsed'][$i][3], $_COOKIE['findmyschoolnom']) !== false) && 
					(($_COOKIE['findmyschoolacademie'] == "tout") || ($_COOKIE['findmyschoolacademie'] == $_SESSION['parsed'][$i][17])) && 
					(($_COOKIE['findmyschoolregion'] == "tout") || ($_COOKIE['findmyschoolregion'] == $_SESSION['parsed'][$i][18])) && 
					(($_COOKIE['findmyschoolville'] == "tout") || ($_COOKIE['findmyschoolville'] == $_SESSION['parsed'][$i][11])) && 
					(($_COOKIE['findmyschooltype'] == "tout") || ($_COOKIE['findmyschooltype'] == $_SESSION['parsed'][$i][2])))
					echo get_tabled_parsed($_SESSION['parsed'][$i]);
				else if (!isset($_COOKIE['findmyschoolnom'])) {
					if ((($_COOKIE['findmyschoolacademie'] == "tout") || ($_COOKIE['findmyschoolacademie'] == $_SESSION['parsed'][$i][17])) && 
					(($_COOKIE['findmyschoolregion'] == "tout") || ($_COOKIE['findmyschoolregion'] == $_SESSION['parsed'][$i][18])) && 
					(($_COOKIE['findmyschoolville'] == "tout") || ($_COOKIE['findmyschoolville'] == $_SESSION['parsed'][$i][11])) && 
					(($_COOKIE['findmyschooltype'] == "tout") || ($_COOKIE['findmyschooltype'] == $_SESSION['parsed'][$i][2])))
					echo get_tabled_parsed($_SESSION['parsed'][$i]);
				}
			}
		}
	}
?>