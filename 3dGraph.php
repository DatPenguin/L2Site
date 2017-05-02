<?php
	
	require_once("includes/parser.inc.php");
	require_once("includes/util.inc.php");
	require_once("includes/findmyschool.inc.php");
//	include_once("includes/header.inc.php");
	require_once ('jpgraph-4.0.2/src/jpgraph.php');
	require_once ('jpgraph-4.0.2/src/jpgraph_pie.php');
	require_once ('jpgraph-4.0.2/src/jpgraph_pie3d.php');
	
	@session_start();

			$stringTab = array();
			$dataTab = array();
			$stringTab = fillStringTab(18);
			//print_r($stringTab);
			
			// On comptera le nombre d'établissement par académie et on en ferra un tableau de données
			for($index = 0; $index < count($stringTab); $index++) {
				//print("\n");
				//print("\n" . $tab[$index] . " : " . countElementsFromData($tab[$index], 17));
				$dataTab[$index] = countElementsFromData($stringTab[$index], 18);				
			}
			
			//$data = array(40,60,21,33);
 
			$graph = new PieGraph(900,600);
			$graph->SetShadow();
 
			//$graph->title->Set("Répartition des établissements par régions");
			//$graph->title->SetFont(FF_FONT1,FS_BOLD);
 
			$p1 = new PiePlot3D($dataTab);
			$p1->SetAngle(35);
			$p1->SetSize(0.5);
			$p1->SetCenter(0.45);
			$p1->SetLegends($stringTab);
 
			$graph->Add($p1);
			$graph->Stroke();

?>
