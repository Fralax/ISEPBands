<?php

class Vue {

  private $fichier;
  private $titre;

  public function __construct($action) {

    $this->fichier = "Vues/vue".$action.".php";
    $this->css = "Contenu/vue".$action.".css";

  }


  public function generer($donnees=[]) {

    $contenu = $this->genererFichier($this->fichier, $donnees);
    $vue = $this->genererFichier('Vues/gabarit.php', array('titre' => $this->titre, 'contenu' => $contenu, 'css' => $this->css));
    echo $vue;
  }


  private function genererFichier($fichier, $donnees) {

    if (file_exists($fichier)) {
      extract($donnees);
      ob_start();
      require $fichier;
      return ob_get_clean();
    }

    else {
      throw new Exception("Fichier '$fichier' introuvable");
    }

  }

}
