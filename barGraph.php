<?php
	require_once("includes/parser.inc.php");
	require_once("includes/util.inc.php");
	require_once("includes/findmyschool.inc.php");
	require_once ('jpgraph-4.0.2/src/jpgraph.php');
	require_once ('jpgraph-4.0.2/src/jpgraph_bar.php');
	@session_start();

	$stringTab = array();
	$dataTab = array();
	$stringTab = fillStringTab(17);
			
	// On comptera le nombre d'établissement par académie et on en ferra un tableau de données
	for($index = 0; $index < count($stringTab); $index++) {
		$dataTab[$index] = countElementsFromData($stringTab[$index], 17);				
	}
			
	$datay=$dataTab;
 
	// Size of graph
	$width=900;
	$height=500;
 
	// Set the basic parameters of the graph
	$graph = new Graph($width,$height);
	$graph->SetScale('textlin');
	 
	$top = 60;
	$bottom = 30;
	$left = 150;
	$right = 30;
	$graph->Set90AndMargin($left,$right,$top,$bottom);
	 
	// Nice shadow
	$graph->SetShadow();
	 
	// Setup labels
	$lbl = $stringTab;
	$graph->xaxis->SetTickLabels($lbl);
	 
	// Label align for X-axis
	$graph->xaxis->SetLabelAlign('right','center','right');
	 
	// Label align for Y-axis
	$graph->yaxis->SetLabelAlign('center','bottom');
	 
	// Create a bar pot
	$bplot = new BarPlot($datay);
	$bplot->SetFillColor('orange');
	$bplot->SetWidth(0.5);
	$bplot->SetYMin(0);
	 
	$graph->Add($bplot);
	 
	$graph->Stroke();
?>
