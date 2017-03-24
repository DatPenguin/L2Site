<?php
	require_once("includes/parser.inc.php");
	require_once("includes/util.inc.php");
	include_once("includes/header.inc.php");
	create_header("Tri par région");
?>
		<h1>Tri par région</h1>
		<form method="post" action="#">
			<select name="liste">
				<option value="tout">[Tout afficher]</option>
				<option value="">[Aucune Région]</option>
				<option value="Auvergne-Rhône-Alpes">Auvergne-Rhône-Alpes</option>
				<option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
				<option value="Bretagne">Bretagne</option>
				<option value="Centre-Val de Loire">Centre-Val de Loire</option>
				<option value="Grand Est">Grand Est</option>
				<option value="Guadeloupe">Guadeloupe</option>
				<option value="Guyane">Guyane</option>
				<option value="Hauts-de-France">Hauts-de-France</option>
				<option value="Île-de-France">Île-de-France</option>
				<option value="La Réunion">La Réunion</option>
				<option value="Martinique">Martinique</option>
				<option value="Normandie">Normandie</option>
				<option value="Nouvelle Aquitaine">Nouvelle Aquitaine</option>
				<option value="Occitanie">Occitanie</option>
				<option value="Pays de la Loire">Pays de la Loire</option>
				<option value="Provence-Alpes-Côte d'Azur">Provence-Alpes-Côte d'Azur</option>
			</select>
			<input type="submit" name="valider" />
		</form>
		<?php
			find_my_school(18);
		?>
<?php
	include_once("includes/footer.inc.php");
?>