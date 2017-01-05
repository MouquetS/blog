<?php

class Article {

  public $instance;
  public $titre;
  public $content;
  public $chapo;
  public $user_id;
  public $article_id;

  public function __construct($titre,$chapo,$content,$user_id) {
    $this->titre = $titre;
    $this->content = $content;
    $this->chapo = $chapo;
    $this->user_id = $user_id;
    $connect = new MyDb("localhost","root","","blog");
    $this->instance = $connect->connectDb();
  }

  public function afficher() {}

  public function modifier($titre,$chapo,$content,$article_id) {
    
    // récupère l'id de l'utilisateur qui a crée l'article
    $request = $this->instance->prepare("SELECT user_id FROM article WHERE id =:article_id");
    $request->execute(array(
       "article_id" => $article_id
      ));
    $userArticle = $request->fetch(PDO::FETCH_ASSOC);
    // Vérifie si l'utilisateur qui veut modifier l'article est bien son auteur original
    if($_SESSION['user']['id'] === $userArticle['user_id']) {
    $this->titre = $titre;
    $this->chapo = $chapo;
    $this->comment = $content;
    $this->article_id = $article_id;
    $request = $this->instance->prepare("UPDATE article SET title=:title,chapo=:chapo,content=:content WHERE id =:id");
    $request->execute(array(
      "title"=>$this->titre,
      "chapo"=>$this->chapo,
      "content"=>$this->content,
      "id"=>$article_id
      ));
  } else { // Affiche un message d'erreur dans le log en cas de modification non autorisée
      log::writeCSV("L'utilisateur (id = ".$_SESSION['user']['id'].") a essayé de modifier l'article appartenant à l'utilisateur ".$userArticle['user_id']." !");
  }

  }

  public function poster() {
    try {
    $request =$this->instance->prepare("INSERT INTO article(title,chapo,content,user_id) VALUES(:title,:chapo,:content,:userId)");
    $request->execute(array(
      "title" => $this->titre,
      "chapo" => $this->chapo,
      "content" => $this->content,
      "userId" => $this ->user_id
    ));
    } catch(PDOException $e) {
     log::writeCSV($e);
    }
  }
}
