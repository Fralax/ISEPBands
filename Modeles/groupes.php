<?php

require_once "Modeles/modele.php";

class groupe extends modele {

  public function creerGroupe($id, $nomGroupe){ 
    $sql = 'INSERT INTO groupe (g_nom, g_createur) VALUES (:nomGroupe, :id)';
    $creerGroupe = $this->executerRequete($sql, array('nomGroupe' => $nomGroupe, 'id' => $id));

  }

}

?>
