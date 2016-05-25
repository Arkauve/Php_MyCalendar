<?php

	/**
	 * connexion a la base de donnée
	 * @var unknown
	 */
$user="user";
$pass="pass";
$host="localhost";
$DB = mysql_connect($host,$user,$pass);
if(!$DB){
	die("Connexion impossible : ".mysql_error());
}
mysql_select_db("",$DB);
?>
