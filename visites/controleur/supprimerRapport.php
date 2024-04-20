<?php
session_start();

// Vérifier si l'utilisateur est connecté en tant que visiteur
if (!isset($_SESSION["id_visiteur"])) {
    header("Location: connexion.php");
    exit();
}

// Vérifier si l'identifiant du rapport à supprimer est fourni dans l'URL
if (isset($_GET["id_rapport"]) && !empty($_GET["id_rapport"])) {
    $id_rapport = $_GET["id_rapport"];

    // Inclure le modèle pour accéder à la base de données des rapports
    include_once "../modele/rapportBD.php";

    // Créer une instance de la classe RapportBD
    $rapportBD = new RapportBD();

    // Supprimer le rapport en utilisant l'identifiant fourni
    $suppressionReussie = $rapportBD->supprimerRapport($id_rapport);

    // Vérifier si la suppression a réussi
    if ($suppressionReussie) {
        // Rediriger l'utilisateur vers une page avec un message de succès
        header("Location: ../vue/gererRapport.php?success=rapport_supprime");
        exit();
    } else {
        // Rediriger avec un message d'erreur si la suppression a échoué
        header("Location: ../vue/gererRapport.php?error=suppression_echouee");
        exit();
    }
} else {
    // Rediriger si l'identifiant du rapport à supprimer n'est pas valide
    header("Location: ../vue/gererRapport.php?error=id_rapport_non_valide");
    exit();
}
?>
