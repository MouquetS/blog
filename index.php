<?php
require "./classes/autoload.php";
spl_autoload_register('Autoload::classesAutoloader');


log::writeCSV("hello");
/*
include "functions/logs/log.php";
*/