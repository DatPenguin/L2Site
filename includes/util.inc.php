<?php
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
		@session_start();
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

	function print_pages($toprint, $reset) {
		if (isset($_GET['page']) && !$reset){
			$page = $_GET['page'];
		}
		else
			$page = 0;
		echo "<div class=\"pagenumbers\">";
		if (count($toprint) <= 10) {
			for ($i = 0; $i < count($toprint) / 10; $i++)
				echo "<a href=\"?page=" . $i . "\">" . $i . "</a>";
		}
		else {
			if ($page > 0)
					echo "<a href=\"?page=" . 0 . "\">" . "Première page" . "</a>";
			for ($i = $page - 3; $i < $page + 4; $i++)
				if ($i >= 0 && $i <= (floor(count($toprint) / 10))) {
					if ($i == $page)						
						echo "<a style=\"font-weight: bolder;\" href=\"?page=" . $i . "\">" . ($i + 1) . "</a>";
					else
						echo "<a href=\"?page=" . $i . "\">" . ($i + 1) . "</a>";
				}
				if ($page != (floor(count($toprint) / 10)))
					echo "<a href=\"?page=" . (floor(count($toprint) / 10)) . "\">" . "Dernière page" . "</a>";
		}
		echo "</div>";
	}
?>