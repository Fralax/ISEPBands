<?php

abstract class modele {

  private $bdd;

  protected function executerRequete($sql, $parametres = null) {
    if ($parametres == null){
      $resultat = $this->getBdd()->query($sql);
    }
    else {
      $resultat = $this->getBdd()->prepare($sql);
      $resultat->execute($parametres);
    }
    return $resultat;
  }

  private function getBdd() {
    if ($this->bdd == null) {

      $this->bdd = new PDO("mysql:host=localhost; dbname=isepBands; charset=utf8", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      //$this->bdd = new PDO("mysql:host=localhost; dbname=ISEPBands; charset=utf8", 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      //$this->bdd = new PDO("mysql:host=mysql.hostinger.fr; dbname=u775182271_isepb; charset=utf8", 'u775182271_user', 'totolino', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return $this->bdd;  }
}
?>
