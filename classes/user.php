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
        $connect = new MyDb("localhost","root","","blog");
        $this->instance = $connect->connectDb();
    }

    public function inscrire() {
        // Vérification de l'existence de l'utilisateur
        $request = $this->instance->prepare("SELECT * FROM user WHERE email ='".$this -> email."'");
        $request -> execute();
        $userExist = $request->fetch();
        // inscription en BDD en cas de non existence de l'utilisateur
        if(!$userExist) {
          $request = $this->instance->prepare("INSERT INTO user(pseudo,password,email,lastname,firstname) VALUES(:pseudo,:password,:email,:nom,:prenom)");
          $request->execute(array(
            ":pseudo" => $this -> pseudo,
            ":password" => sha1($this -> password),
            ":email" => $this -> email,
            ":nom" => $this -> nom,
            ":prenom" => $this -> prenom,
          ));
        } else echo "Vos identifiants sont déjà existants";
    }

    public static function connecter() {
      $request = "SELECT * FROM user WHERE email =:email AND password =:password";
      $request-> execute(array(
        ":email" => $this->email,
        ":password" => $this->password
      ));
      $userConnect = $request -> fetch();
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
