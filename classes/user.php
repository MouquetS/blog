<?php

class User
{
    private $admin = 0;
    public $pseudo;
    public $password;
    public $email;
    public $nom;
    public $prenom;

    public function __construct($nom,$prenom,$pseudo, $password, $email) {
        $this ->pseudo = $pseudo;
        $this ->password = $password;
        $this ->email = $email;
        $this ->nom = $nom;
        $this ->prenom = $prenom;
    }

    public function inscrire() {
        // Vérification de l'existence de l'utilisateur
        $request = $instance->prepare("SELECT * FROM user WHERE user.email =:email");
        $userExist = $request -> execute(array(
          "email" => $this -> email
        ));

        // inscription en BDD en cas de non existence de l'utilisateur
        if(!$userExist) {
          $request = $instance->prepare("INSERT INTO user(pseudo,password,email,nom,prenom,pseudo) VALUES(:pseudo,:password,:email,:nom,:prenom)");
          $inscrit = $instance->execute(array(
            "pseudo" => $this -> pseudo,
            "password" => $this -> password,
            "email" => $this -> email,
            "nom" => $this -> nom,
            "prenom" => $this -> prenom,
            "pseudo" => $this -> pseudo,
          ));
        } else echo "Vos identifiants sont déjà existants";
    }

    public static function connecter() {
      $request = "SELECT * FROM user WHERE email =:email AND password =:password";
      $userConnect = $request-> execute(array(
        "email" => $this->email,
        "password" => $this->password
      )) -> fetch();
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
