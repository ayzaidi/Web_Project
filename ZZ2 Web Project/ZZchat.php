<?php
	session_start();

?>

<!DOCTYPE html>
<html>
	<head>
	<title> ZZ2 Chat Project</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width" />
	 
	<link rel="stylesheet" media="screen" type="text/css" href="ZZChat.css" />
	
	</head>
	<body>
	
	
			
	
	<?php
	
		if( !isset( $_SESSION['env']))
		{
			$_SESSION['env'] = "fr";
		}
		
		if( isset( $_GET['env']))
			$_SESSION['env'] = $_GET['env'];
			
		/* Affichage du message dans différente langue en fonction de l' env */
		if($_SESSION['env'] == "en")
		{	
			$message1 = "ZZ2 Chat Room :";
			$message2 = "Login :";
			$message3 = "Sign in";
			$message4 = "Please enter a login";
			$message5 = "login already taken";
			$message6 = "Wrong login : forbidden character";
			$message7 = "System error";
		}
		else{
		if($_SESSION['env'] == "fr")
		{	
			$message1 = "Salon ZZ2 Chat:";
			$message2 = "Pseudo :";
			$message3 = "Se connecter";
			$message4 = "Veuillez taper un login";
			$message5 = "Pseudo déjà pris";
			$message6 = "Mauvais login : caractère(s) interdit(s)";
			$message7 = "Erreur système";
		}
		else
		{
			$message1 = ": ZZ2 غرفة الدردشة";
			$message2 = ":الاسم المستعار";
			$message3 = "تسجيل الدخول";
			$message4 = "الرجاء إدخال الاسم المستعار";
			$message5 = "الإسم المستعار مستعمل";
			$message6 = "تسجيل الدخول خطأ: حرف ممنوع";
			$message7 = "خطأ في النظام";
		}
		}
		
	?>
	
	<!-- Presentation -->
	<div id="fond"> 
      <div class="ruban">     
        <h2><?php echo $message1;?> </h2>     
      </div>     
      <div class="ruban_gauche"></div>
      <div class="ruban_droit"></div>
	</div>
	
	<!-- Formulaire d'entrée avec proposition du dernier pseudo utilisé-->
	<div id="formContainer" >
            <form id="formlogin" method="post" action="verif.php">
   
                <input type="text" name="login" id="login" value= <?php
				if(isset($_COOKIE['pseudo'])){ echo $_COOKIE['pseudo']; }else{  echo $message2; } ?>  />
                <input type="submit" class="btn btn-default" name="button" value="<?php echo $message3;?>" />
            </form>
            
    </div>
	<?php
	
	/* Vérifie l'existence des erreurs  envoyé par verif.php*/
	$error = 0;
	if( isset( $_GET['error']))
		$error = $_GET['error'];
	
	/* affichage des message d'erreur */
	if($error == 1){ ?>
		<script>
		alert("<?php echo $message4; ?>");
		</script>
			<?php }else if($error == 2){ ?>
		<script>
		alert("<?php echo $message5; ?>");
		</script>
			<?php }else if($error == 3){ ?>
		<script>
		alert("<?php echo $message6; ?>");
		</script>	
			<?php }else if($error == 4){ ?>
		<script>
		alert("<?php echo $message7; ?>");
		</script>
	<?php } ?>
	
	<!-- Drapeaux pour changer les langue -->
	<a id="uk" href="ZZchat.php?env=en"> <img src="images/uk.png" width="48" height="48"/> </a>
	<a id="ar" href="ZZchat.php?env=ar"> <img src="images/ar.png" width="48" height="48" /> </a>
	<a id="fr" href="ZZchat.php?env=fr"> <img src="images/fr.png" width="48" height="48" /> </a>
	
	</body>
</html> 

