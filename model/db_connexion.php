<?php
session_start();
include_once "../inc/db_connetion.php";

require_once('../inc/function.php');

if (isset($_POST["submit"])) { // des qu'on click sur le bouton connxion 
    $email = $_POST['email'];
    $mdp = $_POST['password'];

    $dbConexion = dbConexion(); // etablir la connexion avec la base de données 

    //preparer la requete 
    $request = $dbConexion->prepare('SELECT * FROM  user WHERE email=?');

    try {
        $request->execute(array($email));
        $user = $request->fetch(PDO::FETCH_ASSOC);
        // var_dump($user);//affiche les information sous forme de tableau

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if (empty($user)) { //(empty)si il est vide /si il n'existe pas
        $_SESSION["error"] = "Utilisateur ou mdp inconnu";
        $_SESSION['date_naissance'] = "07/11/1998";
        echo "<script> location.href='http://localhost:3000/connexion.php' </script>";
    } else {
        if (password_verify($mdp, $user['password'])) {
            $_SESSION['bienvenue'] = $user["firstname"];
            echo "<script> location.href='http://localhost:3000/user_page.php' </script>";
        } else {
            echo "Mauvais mdp";
        }

    }
}