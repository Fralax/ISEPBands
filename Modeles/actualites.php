<?php

require_once "Modeles/modele.php";

class actualites extends modele {


    public function recupererDateHeureAction(){
        date_default_timezone_set('Europe/Paris');
        $date = date("Y-m-d H:i:s");
        return $date;
    }

    public function insererActuTypeUtilisateurDate($type, $utilisateur, $date){
        $sql = 'INSERT INTO actualite (a_type, u_id, a_date) VALUES (:type, :utilisateur, :date)';
        $this->executerRequete($sql, array(
            'type' => $type,
            'utilisateur' => $utilisateur,
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

    public function insererActuTypeGroupeUtilisateurDate($type, $utilisateur, $groupe, $date){
        $sql = 'INSERT INTO actualite (a_type, g_nom, u_id, a_date) VALUES (:type, :groupe, :utilisateur, :date)';
        $this->executerRequete($sql, array(
            'type' => $type,
            'groupe' => $groupe,
            'utilisateur' => $utilisateur,
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


}