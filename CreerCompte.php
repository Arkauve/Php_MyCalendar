<!DOCTYPE html>
<html>
<head>
	<title>Creer compte</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>


<h1>Calendrier</h1>

<?php
	if(!empty($_GET)): ?>
		<div class="erreur" >
			<p>Attention erreur de saisi des données</p>
			<ul>
				<?php if(!empty($_GET['nom'])): ?>
					<li><? echo "le nom rentré est invalide"; ?></li>
				<?php endif;
				if(!empty($_GET['prenom'])): ?>
					<li><? echo "le prénom rentré est invalide"; ?></li>
				<?php endif; 
				if(!empty($_GET['adresse'])): ?>
					<li><? echo "l'adresse rentré est invalide"; ?></li>
					<?php endif; 
				if(!empty($_GET['tel'])): ?>
					<li><? echo "le numéro rentré est invalide"; ?></li>
				<?php endif ;
				 if(empty($_GET['mdp'])): ?>
					<li><? echo "le mot de passe est incorect"; ?></li>
				<?php endif; ?>
			</ul>
		</div>
<?php endif; ?>
	 
	<form action="inserer.php" method="POST" name="formulaire_Compte">
	
	<h2>Creer un compte</h2>
	
				<div>
					<label for="" >Nom:</label>	
					<input type="text" name="nom" />
				</div>
				<div>
					<label for="">Prénom:</label>
					<input type="text" name="prenom" />
				</div>
				<div>
					<label for="">Adresse:</label>
					<input type="text" name="adresse"/>
				</div>
				<div>
					<label for="">Telephone:</label>
					<input type="text" name="tel" />
				</div>
				<div>
					<label for="">E-mail:</label>
					<input type="text" name="email" />
				</div>
				<div>
					<label for="">Mot de passe:</label>
					<input type="password" name="mdp" />
				</div>
				<button type="submit" >Valider</button>	
	</form>
	
</body>
</html>