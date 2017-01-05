<?php

class MyDb {
  public $user;
  public $mdp;
  public $host;
  public $dbname;
  public $instance;

  public function __construct ($host, $user, $mdp, $dbname) {
    $this -> host = $host;
    $this -> user = $user;
    $this -> mdp = $mdp;
    $this -> dbname = $dbname;
  }

  public function connectDb() {
      try {
          $this->instance = new PDO ("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->mdp);
          return $this->instance;
      } catch (PDOException $e) {
        die (log::writeCSV($e));
      }
    }

}
