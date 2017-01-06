<?php

class User
{
    public $instance;
    public $admin = 0;
    private $pseudo;
    private $password;
    private $email;
    private $nom;
    private $prenom;

    public function __construct($nom,$prenom,$pseudo, $password, $email) {
        $this ->pseudo = $pseudo;
        $this ->password = $password;
        $this ->email = $email;
        $this ->nom = $nom;
        $this ->prenom = $prenom;
        $connect = new MyDb();
        $this->instance = $connect->connectDb();
    }

    public function inscrire() {

      // données pour la requête INSERT INTO
      $insertTable = "user(pseudo,password,email,lastname,firstname)";
      $insertValue = ":pseudo,:password,:email,:nom,:prenom";
      $insertData = array(
        ":pseudo" => $this -> pseudo,
        ":password" => sha1($this -> password),
        ":email" => $this -> email,
        ":nom" => $this -> nom,
        ":prenom" => $this -> prenom
      );
      // données pour la requête du SELECT
      $selectTable = "user";
      $selectValue = "*";
      $selectData = array();
      $selectCondition ="WHERE email ='".$this -> email."'";
      // Vérification de l'existence de l'utilisateur
      $monInscription = new MyDb();
      $monInscription->connectDb();
      $userExist = $monInscription->select($selectTable,$selectValue,$selectCondition,$selectData);

      // inscription en BDD en cas de non existence de l'utilisateur
        if(!$userExist) {
          // Inscrit l'utilisateur en BDD
          $monInscription = new MyDb();
          $monInscription->connectDb();
          $monInscription->insertInto($insertTable,$insertValue,$insertData);
        } else log::writeCSV("Un utilisateur a essayé de se connecter avec l'adresse mail ".$this -> email." (déjà existante).");
    }

    public function connecter() {
      $selectTable ="user";
      $selectValue="*";
      $selectCondition="WHERE email =:email AND password =:password";
      $selectData = array(
        "email" => $this->email,
        "password" => sha1($this->password)
      );

      $userConnexion = new MyDb();
      $userConnexion->connectDb();
      $userConnect = $userConnexion->select($selectTable,$selectValue,$selectCondition,$selectData);

      if($userConnect) {
        $_SESSION['user'] = array(
          "pseudo" => $userConnect['pseudo'],
          "id" => $userConnect['id']
        );
      } else echo "Vos identifiants sont incorrects";
    }

    public function deconnecter(){
      session_destroy();
    }
}
