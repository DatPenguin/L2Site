<?php
	require_once("includes/util.inc.php");
	function find_my_school($n = 17, $page = 0) {
		@session_start();
		$reset = false;
		if (isset($_GET['page']))
			$page = $_GET['page'];


		if (isset($_POST['liste'])) {
			$_SESSION['liste'] = $_POST['liste'];
			$page = 0;
			$reset = true;
		}

		if ($page == 49.3) {
			echo "<img src=\"images/manu.jpg\" style=\"display: block; margin: auto;\" alt=\"manu\" />";
			return;
		}

		$toprint = array();
		foreach ($_SESSION['parsed'] as $key => $row)
						for ($i = 0; $i < 26; $i++)
							$tab[$i][$key] = $row[$i];

		array_multisort($tab[$n], SORT_ASC, $_SESSION['parsed']);

		for ($i = 1; $i < 3659; $i++) {
			if ((isset($_SESSION['liste']) && ($_SESSION['liste'] == $_SESSION['parsed'][$i][$n] || $_SESSION['liste'] == "tout")) && (isset($_GET['page']) || isset($_POST['liste'])))
				$toprint[] = get_tabled_parsed($_SESSION['parsed'][$i]);
		}

		print_pages($toprint, $reset);

		for ($i = 0; $i < 10; $i++) {
			if (isset($toprint[$i + $page * 10]))
				echo $toprint[$i + $page * 10];
		}
		print_pages($toprint, $reset);
	}

	function find_my_school_advance() {
		@session_start();
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