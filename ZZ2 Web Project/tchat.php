<?php
	/* elimination du cache */
	header("Cache-Control: no-cache");
	
	$fichier = "data/tchat.txt";
	
	
	// lire le fichier et le stocker dans un tableau
	$lines = file($fichier);
	
	//affichage des messages dans tchat.txt
	foreach($lines as $line)
	{
		echo($line);
		echo "<br>";
	}
?>
