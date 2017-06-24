<?php

require_once "Modeles/modele.php";

class actualites extends modele {


    public function recupererDateHeureAction(){
        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d H:i:s");
        return $date;
    }

    public function insererActuTypeUtilisateurDate($type, $utilisateur, $prenom, $nom, $date){
        $sql = 'INSERT INTO actualite (a_type, u_id, u_prenom, u_nom, a_date) VALUES (:type, :utilisateur, :prenom, :nom, :date)';
        $this->executerRequete($sql, array(
            'type' => $type,
            'utilisateur' => $utilisateur,
            'prenom' => $prenom,
            'nom' => $nom,
            'date' => $date
        ));
    }

    public function insererActuTypeGroupeDate($type, $groupe, $date){
        $sql = 'INSERT INTO actualite (a_type, g_nom, a_date) VALUES (:type, :groupe, :date)';
        $this->executerRequete($sql, array(
            'type' => $type,
            'groupe' => $groupe,
            'date' => $date
        ));
    }

    public function insererActuTypeGroupeUtilisateurDate($type, $utilisateur, $prenom, $nom, $groupe, $date){
        $sql = 'INSERT INTO actualite (a_type, g_nom, u_id, u_prenom, u_nom, a_date) VALUES (:type, :groupe, :utilisateur, :prenom, :nom, :date)';
        $this->executerRequete($sql, array(
            'type' => $type,
            'groupe' => $groupe,
            'utilisateur' => $utilisateur,
            'prenom' => $prenom,
            'nom' => $nom,
            'date' => $date
        ));
    }

    public function insererActuTypeGroupeMorceauArtisteDate($type, $groupe, $morceau, $artiste, $date){
        $sql = 'INSERT INTO actualite (a_type, g_nom, j_morceau, j_artiste, a_date) VALUES (:type, :groupe, :morceau, :artiste, :date)';
        $this->executerRequete($sql, array(
            'type' => $type,
            'groupe' => $groupe,
            'morceau' => $morceau,
            'artiste' => $artiste,
            'date' => $date
        ));
    }

    public function insererActuTypeGroupeDebutFinDate($type, $groupe, $debut, $fin, $date){
        $sql = 'INSERT INTO actualite (a_type, g_nom, start, end, a_date) VALUES (:type, :groupe, :debut, :fin, :date)';
        $this->executerRequete($sql, array(
            'type' => $type,
            'groupe' => $groupe,
            'debut' => $debut,
            'fin' => $fin,
            'date' => $date
        ));
    }

    public function recupererActualites($os){

      $dateFR = "SET lc_time_names = 'fr_FR'";
      $this->executerRequete($dateFR);

      $sql = "SELECT a_id, DATE_FORMAT(a_date, '%W %d %M %Y, %Hh%i') as date, a_type, u_id, u_prenom, u_nom, g_nom, j_morceau, j_artiste, DATE_FORMAT(start, '%W %d %M %Y') as startDate, DATE_FORMAT(start, '%Hh%i') as startHeure, DATE_FORMAT(end, '%W %d %M %Y') as endDate, DATE_FORMAT(end, '%Hh%i') as endHeure FROM actualite ORDER BY a_date DESC LIMIT 10 OFFSET $os";
      $recupererActualites = $this->executerRequete($sql);
      return $recupererActualites;
    }


}
