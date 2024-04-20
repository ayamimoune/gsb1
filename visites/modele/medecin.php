<?php

class Medecin {
    private $id_medecin;
    private $nom;
    private $prenom;
    private $adresse;
    private $cp;
    private $ville;
    private $tel;
    private $specialiteComplementaire;
    private $mail;

    public function __construct($id_medecin, $nom, $prenom, $adresse, $cp, $ville, $tel, $specialiteComplementaire, $mail) {
        $this->id_medecin = $id_medecin;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->cp = $cp;
        $this->ville = $ville;
        $this->tel = $tel;
        $this->specialiteComplementaire = $specialiteComplementaire;
        $this->mail = $mail;
    }

    // Getters et Setters pour chaque attribut

    public function getIdMedecin() {
        return $this->id_medecin;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getCp() {
        return $this->cp;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getSpecialiteComplementaire() {
        return $this->specialiteComplementaire;
    }

    public function getMail() {
        return $this->mail;
    }

}

?>
