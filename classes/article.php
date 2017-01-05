<?php

class Article {

  public $instance;
  public $titre;
  public $content;
  public $chapo;
  public $user_id;

  public function __construct($titre,$chapo,$content,$user_id) {
    $this->titre = $titre;
    $this->content = $content;
    $this->chapo = $chapo;
    $this->user_id = $user_id;
    $connect = new MyDb("localhost","root","","blog");
    $this->instance = $connect->connectDb();
  }

  public function afficher() {}
  public function modifier() {}

  public function poster() {
    $date = new DateTime();
    $date->setTimezone(new DateTimeZone('Europe/Paris'));
    $request =$this->instance->prepare("INSERT INTO article(title,chapo,content,date,user_id) VALUES(:title,:chapo,:content,:date,:userId)");
    $request->execute(array(
      "title" => $this->titre,
      "chapo" => $this->chapo,
      "content" => $this->content,
      "date" => $date -> format("Y-m-d H:i:s"),
      "userId" => $this ->user_id
    ));
  }
}
