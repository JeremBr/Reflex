<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_radar.php');






 
// Create the basic rtadar graph
// $graph = new RadarGraph(300,200);
$graph = new RadarGraph(900,600);
 
// Set background color and shadow
$graph->SetColor("white");
$graph->SetShadow();
 
// Position the graph
$graph->SetCenter(0.4,0.55);
 
// Setup the axis formatting     
$graph->axis->SetFont(FF_FONT1,FS_BOLD);
$graph->axis->SetWeight(2);
 
// Setup the grid lines
$graph->grid->SetLineStyle("longdashed");
$graph->grid->SetColor("navy");
$graph->grid->Show();
$graph->HideTickMarks();
        
// Setup graph titles
$graph->title->Set("Quality result");
$graph->title->SetFont(FF_FONT1,FS_BOLD);
// $graph->SetTitles(array("One","Two","Three","Four","Five","Sex","Seven","Eight","Nine","Ten"));
$graph->SetTitles(array("Reconnaissance de tonalite","Rythme cardiaque","Temperature de la peau","Reflexe sonore","Reflexe visuel"));
// Create the first radar plot        
$plot = new RadarPlot(array(40,80,38,10,50));
$plot->SetLegend("Goal");
$plot->SetColor("red","lightred");
$plot->SetFill(false);
$plot->SetLineWeight(2);
 
// Create the second radar plot
$plot2 = new RadarPlot(array($_GET['rec'],$_GET['freq'],$_GET['temp'],$_GET['son'],$_GET['vis']));
$plot2->SetLegend("Actual");
$plot2->SetColor("blue","lightred");
 
// Add the plots to the graph
$graph->Add($plot2);
$graph->Add($plot);
 
// And output the graph
$graph->Stroke();
 
?>