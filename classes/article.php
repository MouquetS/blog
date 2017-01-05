<?php

class Article {

  public $instance;
  public $day;
  public $titre;
  public $contenu;
  public $chapo;

  public function __construct($titre,$chapo,$contenu) {
    $this->titre = $titre;
    $this->contenu = $contenu;
    $this->day = $day;
    $this->chapo = $chapo;
    $connect = new MyDb("localhost","root","","blog");
    $this->instance = $connect->connectDb();
  }

  public function afficher() {}
  public function modifier() {}
  public function poster() {
    $request =$this->instance->prepare("INSERT INTO article(day,title,chapo,content) VALUES(:day,:title,:chapo,:content)");
    $request->execute(array(
      "day" => $this->day,
      "title" => $this->title,
      "chapo" => $this->chapo,
      "content" => $this->content
    ));

  }
}
