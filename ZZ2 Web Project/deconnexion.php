<?php
	session_start();
	
	/*suppression du login dans "Liste_Log.txt" */
	function suppressionLogin($loginASupprimer) 
	{	 			
		$monlog = file("data/Liste_Log.txt");
		$i = 0;
		
		$txtlogfinal = "";
		
		while( isset($monlog[$i]))				
		{
			/*si le login n'est pas le login deconnecté on l'ajoute dans la chaine de carractéres */
			if( $monlog[$i] != $loginASupprimer . "\n")
			{
				$txtlogfinal .= $monlog[$i];
			}				
			$i++;
		}	
				
		$monlog = fopen("data/Liste_Log.txt","w");
		
		fputs( $monlog, $txtlogfinal);
		fclose( $monlog);
							
	}
	/* recuperation du login pour le deconnecter*/
	$loginASupprimer = $_SESSION['login'];
	
	suppressionlogin($loginASupprimer);
	
	session_destroy();

	header("Location: ZZchat.php");
?>
