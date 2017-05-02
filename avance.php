<?php
	if (isset($_POST['academie'])) {
			setcookie("findmyschoolnom", $_POST['nom'], time() + 3600 * 24 * 365);
			setcookie("findmyschoolacademie", $_POST['academie'], time() + 3600 * 24 * 365);
			setcookie("findmyschoolregion", $_POST['region'], time() + 3600 * 24 * 365);
			setcookie("findmyschoolville", $_POST['ville'], time() + 3600 * 24 * 365);
			setcookie("findmyschooltype", $_POST['type'], time() + 3600 * 24 * 365);
		}
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
					<td>
						<label for="nom">Nom</label>
					</td>
					<td>
						<input type="text" name="nom" />
					</td>
				</tr>
				<tr>
					<td>
						<label for="academie">Académie</label>
					</td>
					<td>
						<?php print_list3($_SESSION['parsed'], 17, "academie"); ?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="region">Région</label>
					</td>
					<td>
						<?php print_list3($_SESSION['parsed'], 18, "region"); ?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="ville">Ville</label>
					</td>
					<td>
						<?php print_list3($_SESSION['parsed'], 11, "ville"); ?>
					</td>
				</tr>
				<tr>
					<td>
						<label for="type">Type</label>
					</td>
					<td>
						<?php print_list3($_SESSION['parsed'], 2, "type"); ?>
					</td>
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