<?php
	require_once("includes/util.inc.php");
	require_once("includes/findmyschool.inc.php");
	require_once("includes/parser.inc.php");
	include_once("includes/header.inc.php");
	create_header("Index");
?>
		<h1>Recherche avancée</h1>
		<p>Renseignez vos critères de recherche :</p>
		<form method="post" action="#">
			<table class="avance">
				<tr>
					<td><label for="academie">Académie</label></td><td><select name="academie" id="academie">
				<option value="tout">[Tout afficher]</option>
				<option value="Aix-Marseille">Aix-Marseille</option>
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
			</select></td>
				</tr>
				<tr>
					<td><label for="region">Région</label></td><td><select name="region" id="region">
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
			</select></td>
				</tr>
				<tr>
					<td><label for="ville">Ville</label></td><td><select name="ville" id="ville">
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
			</select></td>
				</tr>
				<tr>
					<td><label for="type">Type</label></td><td><select name="type" id="type">
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
			</select></td>
				</tr>
			</table>
			<input type="submit" name="valider" style="margin-top: 10px;" />
		</form>
		<?php
			find_my_school_advance();
		?>
<?php
	include_once("includes/footer.inc.php");
?>