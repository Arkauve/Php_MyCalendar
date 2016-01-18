<html>
<head>
	<title>Enregistrer évènement</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<h1 id="Titre">Nouvel évènement</h1>

<?php 

if(!empty($_GET)):?>
	<div class="erreur" >
		<ul>
			<?php if($_GET['nom']=='vide'): ?>
				<li><? echo "le nom est vide"; ?></li>
			<?php endif; 
			if(!empty($_GET['nom']) && $_GET['nom']!='vide'): ?>
				<li><? echo "le nom rentré est invalide"; ?></li>
			<?php endif;
			if(!empty($_GET['desciption'])): ?>
				<li><? echo "la description rentré est invalide"; ?></li>
			<?php endif; ?>
		</ul>
	</div>
<?php endif; ?>

	<form action="enregistrer.php?date=<?php echo $_GET['date']; ?>" enctype="multipart/form-data" method="POST" name="formulaire_events">
				<div>
					<label for="" >Nom:</label>	
					<input type="text" name="nom" />
				</div>
				<div>
					<label for="">Description:</label>
					<textarea name="description" cols="50" rows="20"></textarea>
				</div>
				<div class="HeureF">
					<label for="">Heure de début:</label>
					<input type="time" name="heureD" "/>
				</div>
				<div class="heureD">
					<label for="">Heure de fin:</label>
					<input type="time" name="heureF"/>
				</div>
				<div class="Fichier">
					<label for="">Fichier (pdf):</label>
					<input type="file" name="fichier"/>
				</div>
				<button type="submit">Enregistrer</button>
	</form>

</body>
</html>