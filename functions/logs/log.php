<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 04/01/2017
 * Time: 12:30
 */

class Log
{
    private static $today;
    private static $now;

    private static $path = "functions/logs/erreur.php";

    public static function erreur() {
        try {
            $pdo = new PDO("n'importe quoi !");
        } catch (Exception $e) {
            $today = date("d/m/y");
            $now = date("H:i:s");
        $logFiles = fopen(Log::$path,'a+');
        fclose($logFiles);
        }
    }
}