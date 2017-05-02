<?php
	/** 	
	* Fonction permettant de retourner l'affichage d'un établissement sous forme de tableau. 
	* Arg : informations sur 1 établissement sous forme de tableau
	*/
	function get_tabled_parsed($parsed) {
		@session_start();
		$out = "";
		$out .= "\n<table>\n\t<tr class=\"fixed_row\">\n";
		for ($i = 0; $i < 26; $i++)
			if ($i == 0 || $i == 2 || $i == 3 || $i == 5 || $i == 9 || $i == 11 || $i == 14 || $i == 16 || $i == 17 || $i == 18)			// On n'affiche que les colonnes qui nous intéressent
				$out .= "\n\t\t<th>" . ucfirst(str_replace("code", "", str_replace("\"", "", $_SESSION['parsed_headers'][$i]))) . "</th>";
		$out .= "</tr>";

		$out .= "<tr>";
		for ($i = 0; $i < 26; $i++) {
			if ($i == 0 || $i == 2 || $i == 3 || $i == 5 || $i == 9 || $i == 11 || $i == 14 || $i == 16 || $i == 17 || $i == 18)
				$out .= "<td class=\"fixed_row\">" . $parsed[$i] . "</td>";
		}
		$out .= "</tr>";

		$out .= "\n</table>";
		return $out;
	}

	/**
	*	Fonction affichant les pages pour naviguer entre les résultats
	*	Arguments : 
	*	$toprint = l'ensemble des établissements à afficher
	*	$reset = si on vient de changer de critère <=> on ne tient pas compte du numero de page
	*/
	function print_pages($toprint, $reset) { 
		if (isset($_GET['page']) && !$reset)
			$page = $_GET['page'];
		else
			$page = 0;

		echo "<div class=\"pagenumbers\">";

		if (count($toprint) <= 10)																// S'il y a moins de 10 résultats, on n'affiche pas de pages
			for ($i = 0; $i < count($toprint) / 10; $i++)
				echo "<a href=\"?page=" . $i . "\">" . $i . "</a>";
		else {
			if ($page > 0)
					echo "<a href=\"?page=" . 0 . "\">" . "Première page" . "</a>";				// On n'affiche le bouton "Première page" que si l'on n'est pas déjà sur cette page
			for ($i = $page - 3; $i < $page + 4; $i++)
				if ($i >= 0 && $i <= (floor(count($toprint) / 10))) {
					if ($i == $page)
						echo "<a style=\"font-weight: bolder;\" href=\"?page=" . $i . "\">" . ($i + 1) . "</a>";	// On affiche la page actuelle en gras pour la différencier facilement
					else
						echo "<a href=\"?page=" . $i . "\">" . ($i + 1) . "</a>";
				}
				if ($page != (floor(count($toprint) / 10)))
					echo "<a href=\"?page=" . (floor(count($toprint) / 10)) . "\">" . "Dernière page" . "</a>";		// Idem que pour "Première page"
		}
		echo "</div>";
	}

	/**
	 * Va creer un formulaire dynamiquement en fonction de l'arguments choisit
	 * et s'assurera de ne pas ajouter deux éléments similaire
	 * @param array $tab
	 * @param int $colonne
	 */
	function print_list2($tab, $colonnes){
		@session_start();

		for ($a = 0; $a < count($_SESSION['parsed']); $a++)
			$taba[] = $_SESSION['parsed'][$a][$colonnes];

		$taba = array_unique($taba);
		
		$tabSecondaire = array();
		$index = 0;
		foreach($taba as $valua) {
			$tabSecondaire[$index] = $valua;
			$index++;
		}
	
		sort($tabSecondaire);
	
		print("<form method=\"post\" action=\"#\">");
		print("\t <select name=\"liste\">");
		print("\t\t <option value=\"tout\">[Tout afficher]</option>");

		for($i = 1; $i < count($tabSecondaire); $i++)
			print("<option value=\"". $tabSecondaire[$i] . "\">" . $tabSecondaire[$i] . "</option>\n");

		print("</select>");
		print("<input type=\"submit\" name=\"valider\" />");
		print("</form>");
	}

	/**
	 * Va creer un formulaire dynamiquement en fonction de l'arguments choisit
	 * et s'assurera de ne pas ajouter deux éléments similaire
	 * @param array $tab
	 * @param int $colonne
	 */
	function print_list3($tab, $colonnes, $name){
		@session_start();

		for ($a = 0; $a < count($_SESSION['parsed']); $a++)
			$taba[] = $_SESSION['parsed'][$a][$colonnes];

		$taba = array_unique($taba);
		
		$tabSecondaire = array();
		$index = 0;
		foreach($taba as $valua) {
			$tabSecondaire[$index] = $valua;
			$index++;
		}
	
		sort($tabSecondaire);
		print("\t <select name=\"" . $name . "\">");
		print("\t\t <option value=\"tout\">[Tout afficher]</option>");

		for($i = 1; $i < count($tabSecondaire); $i++)
			print("<option value=\"". $tabSecondaire[$i] . "\">" . $tabSecondaire[$i] . "</option>\n");

		print("</select>");
	}
?>