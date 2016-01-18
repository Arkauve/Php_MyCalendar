<?php
session_start();
$Mail=$_SESSION['user'];
$Date=$_GET['date'];

if(empty($_POST['nom'])) {
	header('Location: EnregistrerEvents.php?nom=vide');
	exit();
}

if(!empty($_POST)){
	
	$chaine="";
	
	if( !preg_match('/^[a-zA-Z]/',$_POST["nom"])) {
		$chaine=$chaine."nom=True";
	}
	
	if( !empty($_POST["description"]) && !preg_match('/^[a-zA-Z]/',$_POST["description"])) {
		if(empty($chaine))$chaine=$chaine."description=True";
		else $chaine=$chaine."&amp;description=True";
	}
	
	$stock = 'mettre ici le chemin où on va stocker le fichier';
	
	if (!move_uploaded_file($_FILES['fichier']['tmp_name'], $stock.$_FILES['fichier']['name']))
	{
		if(empty($chaine))$chaine=$chaine."file=True";
		else $chaine=$chaine."&amp;file=True";
	}
	
	if(empty($chaine)){
		require ('connection.php');
		if(empty($_POST['heureD']) && empty($_POST['heureF'])){
			$sql='INSERT INTO Evennement(Nom,Date,Duree, Description,Mail)
					VALUES
					("'.$_POST["nom"].'","'.$Date.'", "1" ,"'.$_POST["description"].'","'.$Mail.'")';
		}
		else {
			$sql='INSERT INTO Evennement(Nom,Date,Duree,HeureD, HeureF, Description,Mail)
					VALUES
					("'.$_POST["nom"].'","'.$Date.'", "1" ,"'.$_POST["heureD"].'","'.$_POST["heureF"].'","'.$_POST["description"].'","'.$Mail.'")';
		}
		mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		mysql_close($DB);
		header('Location: Calendrier.php');
		exit();
	}
	
	header('Location: EnregistrerEvents.php?date='.$Date.'&amp;'.$chaine);
	exit();
}
