<?php
include_once "../modele/visiteur.php"; // Inclure la classe Visiteur
include_once "../modele/connexionPDO.php";

class VisiteurBD {
    private $conn;

    public function __construct() {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    public function addVisiteur($visiteur) {
        try {
            $req = $this->conn->prepare("INSERT INTO visiteur (nom, prenom, email, login, mdp, adresse, tel, cp, ville) 
            VALUES (:nom, :prenom, :email, :login, :mdp, :adresse, :tel, :cp, :ville)");

            $req->bindValue(':nom', $visiteur->getNom());
            $req->bindValue(':prenom', $visiteur->getPrenom());
            $req->bindValue(':email', $visiteur->getEmail());
            $req->bindValue(':login', $visiteur->getLogin());
            $req->bindValue(':mdp', $visiteur->getMdp());
            $req->bindValue(':adresse', $visiteur->getAdresse());
            $req->bindValue(':tel', $visiteur->getTel());
            $req->bindValue(':cp', $visiteur->getCp());
            $req->bindValue(':ville', $visiteur->getVille());

            $req->execute();

            // Récupérer l'ID du visiteur ajouté
            $lastInsertedID = $this->conn->lastInsertId();

            // Retourner l'objet visiteur avec l'ID attribué
            return $this->getVisiteurById($lastInsertedID);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getVisiteurs() {
        try {
            $req = $this->conn->prepare("SELECT * FROM visiteur");
            $req->execute();
            $resultats = $req->fetchAll(PDO::FETCH_ASSOC);

            $visiteurs = [];

            foreach ($resultats as $resultat) {
                $visiteur = new Visiteur(
                    $resultat["id_visiteur"],
                    $resultat["nom"],
                    $resultat["prenom"],
                    $resultat["email"],
                    $resultat["login"],
                    $resultat["mdp"],
                    $resultat["adresse"],
                    $resultat["tel"],
                    $resultat["cp"],
                    $resultat["ville"]
                );

                $visiteurs[] = $visiteur;
            }

            return $visiteurs;

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function getVisiteurById($id_visiteur) {
        try {
            $req = $this->conn->prepare("SELECT * FROM visiteur WHERE id_visiteur = :id_visiteur");
            $req->bindValue(':id_visiteur', $id_visiteur);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);

            if ($resultat) {
                return new Visiteur(
                    $resultat["id_visiteur"],
                    $resultat["nom"],
                    $resultat["prenom"],
                    $resultat["email"],
                    $resultat["login"],
                    $resultat["mdp"],
                    $resultat["adresse"],
                    $resultat["tel"],
                    $resultat["cp"],
                    $resultat["ville"]
                );
            } else {
                return null;
            }

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }


    public function getVisiteurByLogin($login) {
        try {
            $req = $this->conn->prepare("SELECT * FROM visiteur WHERE login = :login");
            $req->bindValue(':login', $login);
            $req->execute();
    
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
    
            if ($resultat) {
                // Construire et retourner un objet Visiteur avec les données récupérées
                return new Visiteur(
                    $resultat["id_visiteur"],
                    $resultat["nom"],
                    $resultat["prenom"],
                    $resultat["email"],
                    $resultat["login"],
                    $resultat["mdp"],
                    $resultat["adresse"],
                    $resultat["tel"],
                    $resultat["cp"],
                    $resultat["ville"]
                );
            } else {
                // Aucun visiteur trouvé pour ce login, retourner null
                return null;
            }
    
        } catch (PDOException $e) {
            // En cas d'erreur PDO, afficher le message d'erreur
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    



}
?>
