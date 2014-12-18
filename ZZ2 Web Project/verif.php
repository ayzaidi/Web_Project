<?php

	/* Starting of the session */
	session_start();
	
	$login = htmlspecialchars($_POST['login']);	
	
	/* test sur le login*/
	$login = trim($login);
	if(isset($login))
	{
		$verifValue = NULL;
			function verifLog($l) 
			{
					
					global $ficLog;
					$ficLog = fopen("Liste_Log.txt","r");
					$ret =0;
					$oldlogin = $l;
					
					/* Suppression des carracteres non souhaités */
					$l = str_replace(CHR(32),"", $l);
					$l = str_replace("$","",$l);
					$l = str_replace("\\","", $l);
					$l = str_replace("/","",$l);
					$l = str_replace("#","", $l);
					$l = str_replace("&","",$l);
					
					
					
					if(strlen($l) < strlen($oldlogin)) /* il y a un carracétre qui doit etre enlever*/
					{
						$ret = 2;
					}
					else
					{
						if ( $ficLog )
						{					
							while ( (!feof($ficLog)) && $ret == 0)
							{
								$tab = fgets($ficLog); /* recuperation d'une ligne depuis le fichier "Liste_Log.txt" */
								if ( strlen($tab) > strlen($l) )
								{
									$nbChar = strlen($tab) - 1; 
								}else
								{
									$nbChar = strlen($l);
								}
								if ( strncmp($tab,$l,$nbChar) == 0) /* Comparaison entre la ligne depuis la Liste_Log.txt et le login */
								{
									$ret = 1;
																	
								}
							}
						}
					}
					fclose($ficLog);
					return $ret;
			}
			
			function LogRegister($l)
			{
				global $ficLog;
				$ficLog = fopen("Liste_Log.txt","a");
				$ret=0;
				
				if ( $ficLog )
				{
					/* ecriture du nouveau login dans  "Liste_log.txt" */
					fputs($ficLog, $l);
					fputs($ficLog, "\n");
				}
				else
				{
					$ret = 1;
				}
				fclose($ficLog);
			return $ret;
			}
			
			
			
			if(empty($login))
			{
				header("Location: ZZchat.php?error=1");
				exit();

			}else
			{
				/* verification du login */
				$verifValue = verifLog($login);
				switch ($verifValue)
				{
					case 0:
					/* le login est bon,l'ecrire dans "Liste_log.txt" */
					$retReg = LogRegister($login);
					if ( $retReg == 1)
					{
						echo ("Erreur Systeme\n");
					
					}
					
					/* login enregistré dans une variable session, et puis envoyer a la seconde page */
					$_SESSION['login'] = $login; 
					header("Location: PageChat.php");
						
						
						break;
					case 1: 
						header("Location: ZZchat.php?error=2");
						break;
					case 2:
						header("Location: ZZchat.php?error=3");
						break;
					default:
						header("Location: ZZchat.php?error=4");
					
				}
			}	
	}
		
?>
