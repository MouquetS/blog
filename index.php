<?php
require "./classes/autoload.php";
spl_autoload_register('Autoload::classesAutoloader');


// Création d'un utilisateur
$perso1 = new user("Philibert","Jean-Charles","Jean-phi","123gg","Jean-Charles@gmail.fr");
$perso1->admin = 1;
$perso1->inscrire();


$article1 = new article("titre","chapo","contenu");

/*
log::writeCSV("hello");

include "functions/logs/log.php";
*/
