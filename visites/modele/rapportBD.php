<?php
include_once "../modele/connexionPDO.php";
include_once "rapport.php";

class RapportBD {
    private $conn;

    // Constructeur
    public function __construct() {
        $pdo = new connexionPDO();
        $this->conn = $pdo->getConn();
    }

    // Méthode pour ajouter un rapport dans la base de données
    public function addRapport($rapport) {
        try {
            $req = $this->conn->prepare("INSERT INTO rapport (date_rapport, motif, bilan, id_visiteur) 
                                         VALUES (:date_rapport, :motif, :bilan, :id_visiteur)");
    
            $req->bindValue(':date_rapport', $rapport->getDateRapport());
            $req->bindValue(':motif', $rapport->getMotif());
            $req->bindValue(':bilan', $rapport->getBilan());
            $req->bindValue(':id_visiteur', $rapport->getIdVisiteur());
            $req->execute();
    
            // Récupérer l'ID du rapport ajouté
            $lastInsertedID = $this->conn->lastInsertId();
    
            // Retourner l'objet rapport avec l'ID attribué
            return $this->getRapportById($lastInsertedID);
    
        } catch (PDOException $e) {
            print "Erreur lors de l'ajout du rapport : " . $e->getMessage();
            die();
        }
    }
    

    // Méthode pour récupérer un rapport par son ID
    public function getRapportById($id_rapport) {
        try {
            $req = $this->conn->prepare("SELECT * FROM rapport WHERE id_rapport = :id_rapport");
            $req->bindValue(':id_rapport', $id_rapport);
            $req->execute();

            $resultat = $req->fetch(PDO::FETCH_ASSOC);

            if ($resultat) {
                return new Rapport(
                    $resultat["id_rapport"],
                    $resultat["date_rapport"],
                    $resultat["motif"],
                    $resultat["bilan"],
                    $resultat[ 'id_visiteur']
                );
            } else {
                return null;
            }

        } catch (PDOException $e) {
            print "Erreur lors de la récupération du rapport : " . $e->getMessage();
            die();
        }
    }

    // Méthode pour récupérer tous les rapports depuis la base de données
    public function getRapports() {
        try {
            $req = $this->conn->prepare("SELECT * FROM rapport");
            $req->execute();
            
            $rapports = [];
            while ($resultat = $req->fetch(PDO::FETCH_ASSOC)) {
                $rapport = new Rapport(
                    $resultat["id_rapport"],
                    $resultat["date_rapport"],
                    $resultat["motif"],
                    $resultat["bilan"],
                    $resultat[ 'id_visiteur' ]
                );
                $rapports[] = $rapport;
            }

            return $rapports;

        } catch (PDOException $e) {
            print "Erreur lors de la récupération des rapports : " . $e->getMessage();
            die();
        }
    }

        // Méthode pour récupérer les rapports d'un visiteur par son ID de visiteur
        public function getRapportsByVisiteur($id_visiteur) {
            try {
                $req = $this->conn->prepare("SELECT * FROM rapport WHERE id_visiteur = :id_visiteur");
                $req->bindValue(':id_visiteur', $id_visiteur);
                $req->execute();
    
                $rapports = [];
                while ($resultat = $req->fetch(PDO::FETCH_ASSOC)) {
                    $rapport = new Rapport(
                        $resultat["id_rapport"],
                        $resultat["date_rapport"],
                        $resultat["motif"],
                        $resultat["bilan"],
                        $resultat[ 'id_visiteur' ]
                    );
                    $rapports[] = $rapport;
                }
    
                return $rapports;
    
            } catch (PDOException $e) {
                print "Erreur lors de la récupération des rapports du visiteur : " . $e->getMessage();
                die();
            }
        }

        // Méthode pour modifier un rapport dans la base de données
public function modifierRapport($rapport) {
    try {
        $req = $this->conn->prepare("UPDATE rapport SET date_rapport = :date_rapport, 
                                                        motif = :motif, 
                                                        bilan = :bilan 
                                     WHERE id_rapport = :id_rapport");

        $req->bindValue(':date_rapport', $rapport->getDateRapport());
        $req->bindValue(':motif', $rapport->getMotif());
        $req->bindValue(':bilan', $rapport->getBilan());
        $req->bindValue(':id_rapport', $rapport->getIdRapport());
        $req->execute();

        // Vérifier si la mise à jour a été effectuée avec succès
        return $req->rowCount() > 0;

    } catch (PDOException $e) {
        print "Erreur lors de la modification du rapport : " . $e->getMessage();
        die();
    }
}

    // Méthode pour supprimer un rapport de la base de données par son ID
    public function supprimerRapport($id_rapport) {
        try {
            $req = $this->conn->prepare("DELETE FROM rapport WHERE id_rapport = :id_rapport");
            $req->bindValue(':id_rapport', $id_rapport);
            $resultat = $req->execute();

            return $resultat; // Retourne true si la suppression réussit, sinon false

        } catch (PDOException $e) {
            // Gérer l'erreur en affichant un message ou en journalisant
            print "Erreur lors de la suppression du rapport : " . $e->getMessage();
            return false; // Indiquer que la suppression a échoué
        }
    }

    // Méthode pour rechercher des rapports par motif ou bilan
public function rechercherRapports($id_visiteur, $keyword) {
    try {
        // Requête SQL pour rechercher les rapports par motif ou bilan
        $req = $this->conn->prepare("SELECT * FROM rapport 
                                     WHERE id_visiteur = :id_visiteur 
                                     AND (motif LIKE :keyword OR bilan LIKE :keyword)");
        $req->bindValue(':id_visiteur', $id_visiteur);
        $req->bindValue(':keyword', '%' . $keyword . '%'); // Ajouter des wildcards pour rechercher dans le contenu
        $req->execute();

        $rapports = [];
        while ($resultat = $req->fetch(PDO::FETCH_ASSOC)) {
            $rapport = new Rapport(
                $resultat["id_rapport"],
                $resultat["date_rapport"],
                $resultat["motif"],
                $resultat["bilan"],
                $resultat['id_visiteur']
            );
            $rapports[] = $rapport;
        }

        return $rapports;

    } catch (PDOException $e) {
        print "Erreur lors de la recherche des rapports : " . $e->getMessage();
        die();
    }
}
 
}
?>
