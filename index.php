<?php
require "./classes/autoload.php";
include "contents/init.php";
spl_autoload_register('Autoload::classesAutoloader');


$perso1 = new user("Philibert","Jean-Charles","Jean-phi","123gg","Jean-Charles@gmail.fr");
/*
$perso1->pseudo = "coucou";
$perso1->nom = "Philibert";
$perso1->prenom = "Jean-Charles";
$perso1->email = "Jean-Charles@gmail.fr";
$perso1->password = "1234gg";
*/
var_dump($perso1);


/*
log::writeCSV("hello");

include "functions/logs/log.php";
*/
