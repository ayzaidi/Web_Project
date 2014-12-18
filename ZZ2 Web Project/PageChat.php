<?php
	session_start();
	
	/*  Mémorisation du login dans un cookie, pendant un jour */
	setcookie('pseudo', $_SESSION['login'] , time() + 24*3600, null, null, false, true);
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<title> ZZ2 Chat Project</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	
	
	 <!-- Call of the CSS page -->
	<link rel="stylesheet" media="screen" type="text/css" href="PageChat.css" />
	
	 <!-- Call of the javascript page : fonction.js -->
	<script type="text/javascript" src="js/fonctions.js"></script>
	
	<script type="text/javascript">
		login = "<?php echo $_SESSION['login'];?>"; <!-- pour avoir le login de la session -->
	</script>
	
	<script type="text/javascript" src="js/activite.js"></script> 
	
	<!-- utilisation de la librairie jquery -->
	<script src="js/jquery-2.0.0.min.js"></script>
	<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
	<link href="jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	</head>

	<body onload='setInterval("refresh()", 1000);' onkeydown="activite_detectee = true;statut('actif');" onmousemove="activite_detectee = true;statut('actif');"> 
		
		<!-- Message d'accueil -->
		<?php if($_SESSION['env'] == "en")
			{	?>
		<script>
		alert(" Hello <?php echo $_SESSION['login']; ?>");
		</script>
		<?php }
		else{ ?>  
		<script>
		alert(" Bonjour <?php echo $_SESSION['login']; ?>");
		</script>		
		<?php } ?>
		
		
	<div id="fond"> 
		<div class="ruban">     
			<h2><?php echo "ZZ Chat";?> </h2>     
		</div>     
		<div class="ruban_gauche">
		</div>
		<div class="ruban_droit">
		</div>
	</div>	
	
	
	
	<!-- appel traitement.php sans rafraichir toute la page -->
	<form action="traitement.php" method="post" onsubmit="teste_ajax(); return(false);"   > 

	<!-- pour les smiley et la police -->
    <div id="smiley">
	<img src="images/sourire.png" onclick="insertTag(':)','');"/>
    <img src="images/clin.png" onclick="insertTag(';)','');"/>
	<img src="images/langue.png" onclick="insertTag(':p','');"/>
    <img src="images/rigole.png" onclick="insertTag(':D','');"/>
    <img src="images/hihi.png" onclick="insertTag(':L','');"/>
	
    <input type="button" value="G" onclick="insertTag('[g\]','[/g\]');"/>
	<input type="button" value="I" onclick="insertTag('[i\]','[/i\]');"/>
	<input type="button" value="U" onclick="insertTag('[s\]','[/s\]');"/>
    </div>
    
		<!-- zone de text, pour le message-->
		<input type="text" id="saisie" name="saisie" placeholder= <?php 
			if($_SESSION['env'] == "en")
			{	?> "Enter a message" <?php }
			else{ ?> "Entrer votre message" <?php } ?> value=" " /><br/>
		
		<!--pour ajouter le ckeditor qui a plus de carractéristques en ce qui concern le traitement de texte-->
		
		<!--<textarea class="ckeditor" style="height: 200px" id="messageText"></textarea> -->
			
		<input class="boutonENV" type="submit" value=<?php 
			if($_SESSION['env'] == "en")
			{	?> "Send message"<?php }
			else{ 
			if($_SESSION['env'] == "fr")
			{	?> "Envoyer message"<?php }
			else{
			?> "Envoyer message" <?php } }?> ><br/>
	</form>
	
	
	<div id="texte" onFocus="go_bottom();">
	</div>
		
	<div id="utilisateurs" >
		
		<?php
			/* affichage utilisateurs connectés*/		
			global $ficLog;
			$ficLog = fopen("data/Liste_Log.txt","r");
			
			while (!feof($ficLog))
			{
				$tab = fgets($ficLog);
				echo $tab; 
				echo "<br>";
			}
			fclose($ficLog);
		?> 

	</div>
	
	
	
	<table>
	<tr><td align ="right">
		<a href="deconnexion.php"><button id = "boutonDeconnexion" class="btn btn-default"> <?php 
			if($_SESSION['env'] == "en")
			{	?> Sign out<?php }
			else{ ?> Deconnexion <?php } ?> </button></a>
			</td></tr>
	</table>
	</body>
</html> 
