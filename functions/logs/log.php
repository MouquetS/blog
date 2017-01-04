<?php

class log
{
    private static $today;
    private static $hour;
    private static $exception;
    private static $path = "functions/logs/";

    public static function connexion() {
        try {
            $pdo = new PDO("n'importe quoi !");
        } catch (Exception $e) {
            log::$exception = $e;
            log::$today = date("d.m.y");
            log::$hour = date("H:i:s");
            log::$path .= "[".log::$today."]Erreur.txt";
            log::logErreur();
        }
    }

    private static function logErreur() {
        $logFiles = fopen(log::$path,'a+');
        fwrite($logFiles,"[".log::$hour."]".log::$exception);
        fclose($logFiles);
    }
}


log::connexion();