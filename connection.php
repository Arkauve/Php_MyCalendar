<?php

	/**
	 * connexion a la base de donn�e
	 * @var unknown
	 */
$user="iut_gr1_rg";
$pass="lama1998";
$host="localhost";
$DB = mysql_connect($host,$user,$pass);
if(!$DB){
	die("Connexion impossible : ".mysql_error());
}
mysql_select_db("iut_gr1_rg",$DB);
?>