<?php

include_once "connexionPDO.php";
include_once "medecin.php";

class MedecinBD {
    private $conn;

    public function __construct() {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    // Méthode pour récupérer tous les médecins de la base de données
    public function getAllMedecins() {
        try {
            $req = $this->conn->prepare("SELECT * FROM medecin");
            $req->execute();
            
            $medecins = [];
            while ($resultat = $req->fetch(PDO::FETCH_ASSOC)) {
                $medecin = new Medecin(
                    $resultat["id_medecin"],
                    $resultat["nom"],
                    $resultat["prenom"],
                    $resultat["adresse"],
                    $resultat["cp"],
                    $resultat["ville"],
                    $resultat["tel"],
                    $resultat["specialiteComplementaire"],
                    $resultat["mail"]
                );
                $medecins[] = $medecin;
            }

            return $medecins;

        } catch (PDOException $e) {
            print "Erreur lors de la récupération des médecins : " . $e->getMessage();
            die();
        }
    }


}

?>
