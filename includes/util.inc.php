<?php

	$days_french = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
	$days_english = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

	$months_french = array(1=>"Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre");
	$months_english = array(1=>"January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

	function print_date($french = true) {
		global $days_french, $days_english, $months_french, $months_english;
		if ($french == true)
			echo ($days_french[date("w")] . " " . date("d") . " " . $months_french[date("n")] . " " . date("Y"));
		else
			echo ($days_english[date("w")] . ", " . $months_english[date("n")] . " " . date("d") . ", " . date("Y"));
	}

	function print_calendar($month = NULL, $year = NULL) {
		global $days_french, $months_french;
		$height = 7;
		$width = 7;
		$current_day = 1;

		if (is_null($month))
			$month = date('n');
		if (is_null($year))
			$year = date('Y');

		$first_of_month = date('w', strtotime(date('01-' . $month . '-Y')));

		echo "<p style=\"text-align: center; background-color: #44f; margin-bottom: 3px;\">" . $months_french[$month] . "</p>";
		echo "<table style=\"background-color: #aaa; width: 100%;\">";
		for ($i = 0; $i < $height; $i++) {
			echo "<tr>\n";
			for ($j = 0; $j < $width; $j++) {

				// ICI LE CONTENU DES CASES
				if ($i == 0)
					echo "\t<td>" . $days_french[$j + 1];
				else if ($i == 1) {
					if ($j >= $first_of_month - 1) {
						if ($j >= 5)
							echo "\t<td style=\"background-color: #999;\">" . $current_day++;
						else
							echo "\t<td>" . $current_day++;
					}
					else
						echo "\t<td style=\"border: 0; background-color: #fff;\">";
				}
				else if ($current_day <= cal_days_in_month(CAL_GREGORIAN, $month, $year)) {
					if ($current_day == date("j") && $month == date("n") && $year == date("Y"))
						echo "\t<td style=\"background-color: red;\">" . $current_day++;
					else if ($j >= 5)
						echo "\t<td style=\"background-color: #999;\">" . $current_day++;
					else
						echo "\t<td>" . $current_day++;
				}
				else
					echo "<td style=\"border: 0; background-color: #fff;\">\n";
				echo "</td>\n";
			}
			echo "</tr>\n";
		}
		echo "</table>\n";
	}

	function return_calendar($month = NULL, $year = NULL) {
		global $days_french, $months_french;
		$height = 7;
		$width = 7;
		$current_day = 1;

		if (is_null($month))
			$month = date('n');
		if (is_null($year))
			$year = date('Y');

		$first_of_month = date('w', strtotime(date('01-' . $month . '-Y')));

		$out = "<div style=\"width: 30%;\">\n<p style=\"text-align: center; background-color: #44f; margin-bottom: 3px;\">" . $months_french[$month] . "</p>";
		$out .= "<table style=\"background-color: #aaa; width: 100%;\">";
		for ($i = 0; $i < $height; $i++) {
			$out .= "<tr>\n";
			for ($j = 0; $j < $width; $j++) {

				// ICI LE CONTENU DES CASES
				if ($i == 0)
					$out .= "\t<td style=\"background-color: #b0b;\">" . $days_french[$j + 1];
				else if ($i == 1) {
					if ($j >= $first_of_month - 1) {
						if ($j >= 5)
							$out .= "\t<td style=\"background-color: #999;\">" . $current_day++;
						else
							$out .= "\t<td>" . $current_day++;
					}
					else
						$out .= "\t<td style=\"border: 0; background-color: #fff;\">";
				}
				else if ($current_day <= cal_days_in_month(CAL_GREGORIAN, $month, $year)) {
					if ($current_day == date("j") && $month == date("n") && $year == date("Y"))
						$out .= "\t<td style=\"background-color: red;\">" . $current_day++;
					else if ($j >= 5)
						$out .= "\t<td style=\"background-color: #999;\">" . $current_day++;
					else
						$out .= "\t<td>" . $current_day++;
				}
				else
					$out .= "<td style=\"border: 0; background-color: #fff;\">\n";
				$out .= "</td>\n";
			}
			$out .= "</tr>\n";
		}
		$out .= "</table>\n</div>\n";
		return $out;
	}

	function return_tabled_calendar($month = NULL, $year = NULL) {
		global $days_french, $months_french;
		$height = 7;
		$width = 7;
		$current_day = 1;

		if (is_null($month))
			$month = date('n');
		if (is_null($year))
			$year = date('Y');

		$first_of_month = date('w', strtotime(date('01-' . $month . '-Y')));

		$out = "<div style=\"width: 100%;\">\n<p style=\"text-align: center; background-color: #44f; margin-bottom: 3px; margin-top: 0;\">" . $months_french[$month] . "</p>";
		$out .= "<table style=\"background-color: #aaa; width: 100%;\" class=\"liltab\">";
		for ($i = 0; $i < $height; $i++) {
			$out .= "<tr>\n";
			for ($j = 0; $j < $width; $j++) {

				// ICI LE CONTENU DES CASES
				if ($i == 0)
					$out .= "\t<td style=\"background-color: #b0b;\">" . $days_french[$j + 1];
				else if ($i == 1) {
					if ($j >= $first_of_month - 1) {
						if ($j >= 5)
							$out .= "\t<td style=\"background-color: #999;\">" . $current_day++;
						else
							$out .= "\t<td>" . $current_day++;
					}
					else
						$out .= "\t<td style=\"border: 0; background-color: #fff;\">";
				}
				else if ($current_day <= cal_days_in_month(CAL_GREGORIAN, $month, $year)) {
					if ($current_day == date("j") && $month == date("n") && $year == date("Y"))
						$out .= "\t<td style=\"background-color: red;\">" . $current_day++;
					else if ($j >= 5)
						$out .= "\t<td style=\"background-color: #999;\">" . $current_day++;
					else
						$out .= "\t<td>" . $current_day++;
				}
				else
					$out .= "<td style=\"border: 0; background-color: #fff;\">\n";
				$out .= "</td>\n";
			}
			$out .= "</tr>\n";
		}
		$out .= "</table>\n</div>\n";
		return $out;
	}

	function print_year($year = NULL, $format = NULL) {
		$default_year = false;

		if (is_null($year)) {
			$year = date("Y");
			$default_year = true;
		}

		echo "<div style=\"width: 100%;\">\n<p style=\"text-align: center; background-color: #44f; margin-bottom: 3px;\">" . $year . "</p>";
		echo "<table class=\"liltab\">\n";

		$current_month = 1;
		if (is_null($format))
			$format = 4;
		if ($default_year == true) {
			$year = date("Y");
			echo "<tr>\n";
			for($i = 1; $i < 4; $i++)
				echo "<td>\n" . return_tabled_calendar(date("n") - 2 + $i, 2017) . "\n</td>";
		}
		else {
			while($current_month <= 12) {
				echo "<tr>";
				for($i = 1; $i <= $format; $i++) {
					if ($current_month > 12)
						break;
					echo "<td>\n" . return_tabled_calendar($current_month, $year) . "\n</td>";
					$current_month++;
				}
			}
		}
		echo "</tr>\n</table>\n</div>\n";
	}

	function get_hits() {
		$out = "";
		if (file_exists("files/hits"))
			$hits_file = fopen("files/hits", 'r+');
		else {
			$hits_file = fopen("files/hits", 'a+');
		}

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

	function print_hits() {
		echo "<p>";
		if (file_exists("files/hits"))
			$hits_file = fopen("files/hits", 'r+');
		else {
			$hits_file = fopen("files/hits", 'a+');
		}

		$current = fgets($hits_file);
		if ($current == "")
			$current = 0;
		$current++;

		fseek($hits_file, 0);
		fputs($hits_file, $current);

		fclose($hits_file);

		echo strval($current);
		echo "</p>";
	}

	function print_random_image() {
		if (!$dossier = opendir('photos'))
			exit(1);
		while(false !== ($fichier = readdir($dossier))) {
			if ($fichier != '.' && $fichier != '..')
				$files[] = $fichier;
		}
		$tmp = $files[array_rand($files)];
		echo"<figure>
		  <img src=\"photos/" . $tmp . "\" alt=\"\" />
		  <figcaption style=\"text-align: initial;\">" . $tmp . "</figcaption>
		</figure>";

		closedir($dossier);
	}
?>