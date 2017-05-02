<?php
//	require_once("includes/parser.inc.php");
//	require_once("includes/util.inc.php");
//	require_once("includes/findmyschool.inc.php");
	include_once("includes/header.inc.php");
//	require_once ('jpgraph-4.0.2/src/jpgraph.php');
//	require_once ('jpgraph-4.0.2/src/jpgraph_pie.php');
//	require_once ('jpgraph-4.0.2/src/jpgraph_pie3d.php');
	
	create_header("Graphiques");
	@session_start();
?>
		<h1>Graphs</h1>

		<article>
			<h3>Répartitions des établissement en fonction des régions</h3>
			<p>Les 0% affichés ne veulent pas dire qu'il n'y a pas d'établissement dans cette région, uniquement qu'ils constituent moins de 1% du total des établissements </p>
			<img src="3dGraph.php" alt="Graph 3d"/>
						
	</article>
		
<?php
	include_once("includes/footer.inc.php");
?>
