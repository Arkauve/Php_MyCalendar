<!DOCTYPE html>
<html>
	<head>
		<title>Calendrier</title>
		<link rel="stylesheet" href="style.css" type="text/css">
	</head>
	<body>
	
		<h1 id="Titre">Calendrier</h1>
		
<?php
	if(!empty($_GET)): ?>
		<div class="erreur" >
			<p>Addresse e-mail ou mot de passe incorrect</p>
		</div>
<?php endif; ?>
		
		<form name="login_form" class="login" action="connecter.php" method="post" target="_top">
		
		<h2>Connexion</h2>
		
		        <div>
		            <label for="Email">Adresse e-mail</label>
		            <input name="username" class="textfield" id="input_username" type="text" size="24" value="">
		        </div>
		        <div>
		            <label for="input_password">Mot de passe</label>
		            <input name="password" class="textfield" id="input_password" type="password" size="24" value="">
		        </div>
		        <button id="input_go" type="submit" data-icon="F">Valider</button>
		        <button onclick=" location.href='CreerCompte.php';" type="button">Créer un compte</button>
		</form>
		
		
	</body>
</html>