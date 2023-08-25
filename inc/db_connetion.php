<?php
function dbConexion()
{
     $connexion = null; //variable qui doit stocker notre instance de conexion a la base de données
     $host = 'localhost';
     $dbName = "biblio";
     $identify = 'root';
     $password = "";
try { //try (essayer) de se connecter à la base de donnnées
$connexion = new PDO("mysql:host=$host;dbname=$dbName",$identify,$password);
//on récupere l'objet de conexion à la base de données dans la variable $conexionDb

} catch (PDOException $erreur) { //si ces faux il revele une erreur
$connexion = $erreur->getMessage(); // on recupere l'erreur dans $connexion
}
return $connexion; // retour de l'objet de conexion ou une erreur
}