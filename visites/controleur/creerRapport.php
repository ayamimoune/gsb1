<?php
include_once "../modele/connexionPDO.php";
include_once "../modele/rapport.php";
include_once "../modele/rapportBD.php";

// Vérifier si l'utilisateur est connecté et que son ID visiteur est en session
session_start();
if (isset($_SESSION["id_visiteur"])) {
    $id_visiteur = $_SESSION["id_visiteur"];

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Récupérer les valeurs du formulaire
        $date_rapport = $_POST["date_rapport"];
        $motif = $_POST["motif"];
        $bilan = $_POST["bilan"];

        // Créer un objet Rapport avec les données du formulaire et l'ID du visiteur
        $rapport = new Rapport(null, $date_rapport, $motif, $bilan, $id_visiteur);

        // Créer une instance de RapportBD pour gérer les opérations sur les rapports
        $rapportBD = new RapportBD();

        // Ajouter le rapport à la base de données
        $nouveauRapport = $rapportBD->addRapport($rapport);

        if ($nouveauRapport) {
            // Rediriger vers une page de succès ou afficher un message de succès
            header("Location: ../vue/gererRapport.php");
            exit();
        } else {
            // Gérer l'erreur si l'ajout du rapport a échoué
            $erreur = "Erreur lors de la création du rapport.";
            // Vous pouvez rediriger vers une page d'erreur ou afficher un message d'erreur
        }
    } else {
        // Redirection vers le formulaire de création de rapport si le formulaire n'a pas été soumis correctement
        header("Location: creerRapport.php");
        exit();
    }
} else {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ../vue/connexion.php");
    exit();
}
?>
