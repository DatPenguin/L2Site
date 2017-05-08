<?php
	include_once("includes/header.inc.php");
	
	create_header("Graphes");
	@session_start();
?>
	<h1>Graphes</h1>

	<article>
		<h3>Répartitions des établissements en fonction des régions</h3>
		<p>Les 0% affichés ne veulent pas dire qu'il n'y a pas d'établissements dans cette région, mais qu'ils constituent moins de 1% du total des établissements.</p>
		<img src="3dGraph.php" alt="Graph 3d"/>
	</article>
	<article>
		<h3>Nombre d'établissements en fonction des académies</h3>
		<img src="barGraph.php" alt="bar Graph"/>
	</article>
<?php
	include_once("includes/footer.inc.php");
?>
