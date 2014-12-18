<?php
	session_start();
	
	$login = $_SESSION['login'];
	
	$message = (isset($_POST['saisie'])) ? htmlspecialchars($_POST['saisie']) : NULL;
	$date = "[".date("d-m-Y")."] ";
	$heure = "  ".date("H:i")."  ";
	// bold
	$message = preg_replace('`\[g\](.+)\[/g\]`', '<b>$1</b>', $message); 
	//italic
	$message = preg_replace('`\[i\](.+)\[/i\]`', '<i>$1</i>', $message);
	//underline
	$message = preg_replace('`\[s\](.+)\[/s\]`', '<u>$1</u>', $message);
	// transformation du texte par des smiley */
	$message = str_replace(':)', '<img src="images/sourire.png" title="smiley" alt="smiley" />', $message);
	$message = str_replace(':D', '<img src="images/rigole.png" title="smiley" alt="smiley" />', $message);
	$message = str_replace(';)', '<img src="images/clin.png" title="smiley" alt="smiley" />', $message);
	$message = str_replace(':p', '<img src="images/langue.png" title="smiley" alt="smiley" />', $message);
	$message = str_replace(':L', '<img src="images/sourire.png" title="smiley" alt="smiley" />', $message);
		
		
	$fichier = "data/tchat.txt";
	$fichier_a_ouvrir = fopen ($fichier, "a+");
	fwrite($fichier_a_ouvrir, $date.$heure.$login.' : '.$message."\r\n" );
	fclose ($fichier_a_ouvrir);
	 
?>
