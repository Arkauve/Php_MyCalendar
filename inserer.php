<?php
session_start();
if(!empty($_POST)){
	
	$chaine="";
	
	if(empty($_POST["nom"]) || !preg_match('/^[a-zA-Z]/',$_POST["nom"])){
		$chaine=$chaine."nom=True";
	}
	
	if(empty($_POST["prenom"]) || !preg_match('/^[a-zA-Z]/',$_POST["prenom"])){
		if(empty($chaine))$chaine=$chaine."prenom=True";
	 		else $chaine=$chaine."&amp;prenom=True";
	}
	
	if(empty($_POST["adresse"]) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
		if(empty($chaine))$chaine=$chaine."adresse=True";
	 		else $chaine=$chaine."&amp;adresse=True";
	}
	
	if(empty($_POST["tel"]) || iconv_strlen($_POST['tel'])!=10){
		if(empty($chaine))$chaine=$chaine."tel=True";
	 		else $chaine=$chaine."&amp;tel=True";
	}
	
	if(empty($_POST["email"]) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
		if(empty($chaine))$chaine=$chaine."email=True";
	 		else $chaine=$chaine."&amp;email=True";
	}
	
	if(empty($_POST["mdp"]) || iconv_strlen($_POST['mdp'])!=8) {
		if(empty($chaine))$chaine=$chaine."mdp=True";
	 		else $chaine=$chaine."&amp;mdp=True";
	}
	
	if(empty($chaine)){
		require ('connection.php');
		$sql="INSERT INTO Compte(Nom,Prenom,Mail,Adresse,Telephone,MotDePasse)
			VALUES
			(UPPER('".$_POST["nom"]."'),'".$_POST["prenom"]."',LOWER('".$_POST["email"]."'), '".$_POST['adresse']."','".$_POST['tel']."' ,'".$_POST["mdp"]."')";
		mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());
		mysql_close($DB);
		$_SESSION['user']=$_POST["email"];
		header('Location: Calendrier.php');
		exit();
	}
	header('Location: CreerCompte.php?'.$chaine);
}
?>

	
	