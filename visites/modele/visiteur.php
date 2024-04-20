<?php

class Visiteur {
    private $id_visiteur;
    private $nom;
    private $prenom;
    private $email;
    private $login;
    private $mdp;
    private $adresse;
    private $tel;
    private $cp;
    private $ville;

    // Constructeur
    public function __construct($id_visiteur, $nom, $prenom, $email, $login, $mdp, $adresse, $tel, $cp, $ville) {
        $this->id_visiteur = $id_visiteur;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->login = $login;
        $this->mdp = $mdp;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->cp = $cp;
        $this->ville = $ville;
    }

    // Getters
    public function getIdVisiteur() {
        return $this->id_visiteur;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getCp() {
        return $this->cp;
    }

    public function getVille() {
        return $this->ville;
    }

}
