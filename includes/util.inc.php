<?php
	@session_start();
	function get_hits() {
		$out = "";
		if (file_exists("files/hits"))
			$hits_file = fopen("files/hits", 'r+');
		else
			$hits_file = fopen("files/hits", 'a+');

		$current = fgets($hits_file);
		
		if ($current == "")
			$current = 0;
		$current++;

		fseek($hits_file, 0);
		fputs($hits_file, $current);

		fclose($hits_file);

		$out = strval($current);
		return $out;
	}

	function get_tabled_parsed($parsed) {
		$out = "";
		$out .= "\n<table>\n\t<tr class=\"fixed_row\">\n";
		for ($i = 0; $i < 26; $i++)
			if ($i == 0 || $i == 2 || $i == 3 || $i == 5 || $i == 9 || $i == 11 || $i == 14 || $i == 16 || $i == 17 || $i == 18)
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

	function find_my_school($n = 17) {
		foreach ($_SESSION['parsed'] as $key => $row)
						for ($i = 0; $i < 26; $i++)
							$tab[$i][$key] = $row[$i];

		array_multisort($tab[$n], SORT_ASC, $_SESSION['parsed']);

		for ($i = 1; $i < 3659; $i++) {
			if (isset($_POST['liste']) && ($_POST['liste'] == $_SESSION['parsed'][$i][$n] || $_POST['liste'] == "tout"))
				echo get_tabled_parsed($_SESSION['parsed'][$i]);
		}
	}

	function find_my_school_advance() {
		if (!isset($_POST['academie']))
			return;
		foreach ($_SESSION['parsed'] as $key => $row)
						for ($i = 0; $i < 26; $i++)
							$tab[$i][$key] = $row[$i];

		array_multisort($tab[17], SORT_ASC, $_SESSION['parsed']);

		for ($i = 1; $i < 3659; $i++) {
			if ((($_POST['academie'] == "tout") || ($_POST['academie'] == $_SESSION['parsed'][$i][17])) && (($_POST['region'] == "tout") || ($_POST['region'] == $_SESSION['parsed'][$i][18])) && (($_POST['ville'] == "tout") || ($_POST['ville'] == $_SESSION['parsed'][$i][11])) && (($_POST['type'] == "tout") || ($_POST['type'] == $_SESSION['parsed'][$i][2])))
				echo get_tabled_parsed($_SESSION['parsed'][$i]);
		}
	}
?>