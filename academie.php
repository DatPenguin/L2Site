<?php
	require_once("includes/parser.inc.php");
	require_once("includes/util.inc.php");
	include_once("includes/header.inc.php");
	create_header("Tri par académie");
?>
		<h1>Tri par académie</h1>
		<form method="post" action="#">
			<select name="liste">
				<option value="Aix-Marseille">Aix-Marseille</option>
				<option value="Amiens">Amiens</option>
				<option value="Amiens">Amiens</option>
				<option value="Besançon">Besançon</option>
				<option value="Bordeaux">Bordeaux</option>
				<option value="Caen">Caen</option>
				<option value="Clermont-Ferrand">Clermont-Ferrand</option>
				<option value="Créteil">Créteil</option>
				<option value="Dijon">Dijon</option>
				<option value="Grenoble">Grenoble</option>
				<option value="Guyane">Guyane</option>
				<option value="La Réunion">La Réunion</option>
				<option value="Lille">Lille</option>
				<option value="Limoges">Limoges</option>
				<option value="Lyon">Lyon</option>
				<option value="Martinique">Martinique</option>
				<option value="Montpellier">Montpellier</option>
				<option value="Nancy-Metz">Nancy-Metz</option>
				<option value="Nantes">Nantes</option>
				<option value="Nice">Nice</option>
				<option value="Orléans-Tours">Orléans-Tours</option>
				<option value="Lille">Lille</option>
				<option value="Paris">Paris</option>
				<option value="Poitiers">Poitiers</option>
				<option value="Reims">Reims</option>
				<option value="Rennes">Rennes</option>
				<option value="Rouen">Rouen</option>
				<option value="Strasbourg">Strasbourg</option>
				<option value="Toulouse">Toulouse</option>
				<option value="Versailles">Versailles</option>
			</select>
			<input type="submit" name="valider" />
		</form>
			<?php
				for ($i = 1; $i < 3659; $i++) {
					if (isset($_POST['liste']) && $_POST['liste'] == $_SESSION['parsed'][$i][17])
						echo get_tabled_parsed($_SESSION['parsed'][$i]);
				}
			?>
<?php
	include_once("includes/footer.inc.php");
?>