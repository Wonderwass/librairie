<?php
session_start();

require_once "../inc/db_connetion.php";

if (isset($_POST["inscription"])) {
    $lastName = $_POST["lastName"];
    if (isset($_POST["firstName"])) {
        $firstName = $_POST["firstName"];
    } else {
        $firstName = null;
    }
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];
    $mdpcript = password_hash($password, PASSWORD_DEFAULT);
    $birthday = $_POST["birthday"];
    $phone = $_POST["phone"];
    $genre = $_POST["genre"];
    $country = $_POST["country"];
    $message = $_POST["message"];
    if (isset($_POST["conditions"])){
        $conditions = $_POST["conditions"];
    }
    else {
        echo "conditions obligatoir";
    }
    


    // etablir la connexion avec la base de données 
    $dbConexion = dbConexion();
    // preparer la requete 
    $request = $dbConexion->prepare("INSERT INTO user (civility, firstName,lastName, email, password, country, phone, birthday, message, conditions) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    try {
        $request->execute(array($genre, $firstName, $lastName, $email, $mdpcript, $country, $phone, $birthday,$message, $conditions));

    } catch (PDOException $e) {
        $e->getMessage();
    }

}