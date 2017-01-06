<?php
require "./classes/autoload.php";
spl_autoload_register('Autoload::classesAutoloader');
session_start();

// Création d'une instance utilisateur
$perso1 = new user("Philibert","Jean-Charles","Jean-phi","123gg","Jean-Charles@gmail.fr");
// inscription et connexion de l'utilisateur
$perso1->inscrire();
$perso1->connecter();

// Création d'une instance article
$article1 = new article("Le PHP pour les nuls","Je vais bien tout va bien","Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",$_SESSION['user']['id']);

// $article1->poster();

// Création d'une instance utilisateur
$perso2 = new user("Mouquet","Sébastien","Seb76","c moi","seb_mouquet@gmail.fr");
// inscription et connexion de l'utilisateur
//$perso2->inscrire();
$perso2->connecter();

// utilisateur 2 essaie de modifier l'article créé par l'utilisateur 1 (message d'erreur stocké en log)
$article1->modifier("J'ai changé","Pas tant que ça","Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",18);

//$article1->afficher();

include "contents/header.php";
include "templates/formInscription.php";
include "contents/footer.php";

// Création d'une instance utilisateur
$perso3 = new user("Moimoi","Sébastien","Seb76","c moi","seb@gmail.fr");
// inscription et connexion de l'utilisateur
$perso3->inscrire();

?>
