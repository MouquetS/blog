<?php

class MyDb {

  public $instance;

  public function connectDb() {
      $host = "localhost";
      $user = "root";
      $mdp = "";
      $dbname = "blog";
      try {
          $this->instance = new PDO ("mysql:host=".$host.";dbname=".$dbname,$user,$mdp);
          return $this->instance;
      } catch (PDOException $e) {
        die (log::writeCSV($e));
      }
    }

  public function insertInto($table, $value, $data) {
    $request = $this->instance->prepare("INSERT INTO ".$table." VALUES(".$value.")");
    $request->execute($data);
    $resultat = $request->fetch();
    return $resultat;
  }

  public function select($table,$value,$condition,$data) {
    $request = $this->instance->prepare("SELECT ".$value." FROM ".$table." ".$condition);
    $request -> execute($data);
    $resultat = $request->fetch();
    return $resultat;
  }

}
