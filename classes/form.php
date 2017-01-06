<?php
  class Form {

    public $maBalise;

    public $myInput = array(
      0 => array("input","text","nom",""),
      1 => array("input","text","prenom",""),
      2 => array("input","text","pseudo",""),
      3 => array("input","text","email",""),
      4 => array("input","password","Mot de passe",""),
      5 => array("input","submit","button_submit","S'inscrire"),
    );

  public function createBalise() {
        $maBalise = "";
        for($i = 0;$i < count($this->myInput);$i++) {
          $maBalise .="<p>";
          if(($this->myInput[$i][1]!="submit")) {
            $maBalise .= "<label for='".$this->myInput[$i][2]."'>".$this->myInput[$i][2]."</label>";
          }
          if($this->myInput[$i][0]!="button") {
            $maBalise .= "<".$this->myInput[$i][0]." type='".$this->myInput[$i][1]."' id='".$this->myInput[$i][2]."' name='".$this->myInput[$i][2]."' value=".$this->myInput[$i][3].">";
          } else {
            $maBalise .= "<".$this->myInput[$i][0]." type='".$this->myInput[$i][1]."' id='".$this->myInput[$i][2]."' name='".$this->myInput[$i][2]."'>".$this->myInput[$i][3];
          }
            $maBalise .="</".$this->myInput[$i][0].">";
        }
        $maBalise .= "</p>";
        $this->maBalise = $maBalise;
  }

    public function createForm() {
      $myForm = "<form>";
      $myForm .= $this->createBalise();
      $myForm = "</form>";


        echo $this->maBalise;



    }
    public function showForm() {}

      // url destination
      // method
    }

?>
