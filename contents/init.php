<?php
    $user = "root";       # utilisateur de la BDD
    $mdp = "";            # mot de passe de l'utilisateur
    $host="localhost";    # adresse de la BDD
    $dbname="blog";

    // Connexion à la BDD
    try {
      //on instancie une nouvelle connexion (BDO) à la BDD
      $instance = new PDO ("mysql:host=".$host.";dbname=".$dbname,$user,$mdp);
    } catch (PDOException $e) {
        die ("Erreur :". $e->getMessage());
    }
