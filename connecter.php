<?php

session_start();
require ('connection.php');
$sql="SELECT Nom, Prenom, Mail
	FROM Compte
	WHERE Mail = LOWER('".$_POST["username"]."') AND MotDePasse = '".$_POST["password"]."'";

$req = mysql_query($sql);
mysql_close($DB);

$data = mysql_fetch_array($req);
if(empty($data))header('Location: index.php?erreur=True'); 
else{
	$_SESSION['user']=$_POST["username"];
	header('Location: Calendrier.php');
}

exit();
?>