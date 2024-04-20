<?php

class Rapport {
    private $id_rapport;
    private $date_rapport;
    private $motif;
    private $bilan;
    private $id_visiteur;


    // Constructeur
    public function __construct($id_rapport, $date_rapport, $motif, $bilan, $id_visiteur) {
        $this->id_rapport = $id_rapport;
        $this->date_rapport = $date_rapport;
        $this->motif = $motif;
        $this->bilan = $bilan;
        $this->id_visiteur = $id_visiteur;
    }

    // Getters
    public function getIdRapport() {
        return $this->id_rapport;
    }

    public function getDateRapport() {
        return $this->date_rapport;
    }

    public function getMotif() {
        return $this->motif;
    }

    public function getBilan() {
        return $this->bilan;
    }

    public function getIdVisiteur() {
        return $this->id_visiteur;
    }
}

?>