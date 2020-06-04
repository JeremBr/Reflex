<?php

	
	$countTest = $bdd->query('SELECT COUNT(*) AS total FROM test');
	$data = $countTest->fetch();
	$countTest->closeCursor();

	$allTest = $bdd->query('SELECT * FROM test');
	$totalReco=0;
	$totalFreq=0;
	$totalTemp=0;
	$totalSono=0;
	$totalVisu=0;
	while($value = $allTest->fetch()){

		$totalReco = ($totalReco + $value['RecoTona']);
		$totalFreq = ($totalFreq + $value['freqCard']);
		$totalTemp = ($totalTemp + $value['temperature']);
		$totalSono = ($totalSono + $value['refSonore']);
		$totalVisu = ($totalVisu + $value['refVisuel']);
	}

	$moyenneReco = ($totalReco / $data['total']);
	$moyenneFreq = ($totalFreq / $data['total']);
	$moyenneTemp = ($totalTemp / $data['total']);
	$moyenneSono = ($totalSono / $data['total']);
	$moyenneVisu = ($totalVisu / $data['total']);
	
	
	

?>