<?php
session_start();

// Vérifier si l'utilisateur est connecté en tant que propriétaire
if (!isset($_SESSION["id_visiteur"])) {
    header("Location: connexion.php");
    exit();
}

// Inclusion des fichiers nécessaires
include_once "../modele/visiteurBD.php";
include_once "../modele/rapportBD.php";

// Récupération de l'ID du propriétaire connecté
$id_visiteur = $_SESSION["id_visiteur"];

// Vérification si le formulaire est soumis (modification d'un appartement)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_rapport"])) {
    // Récupération des données du formulaire
    $id_rapport = $_POST["id_rapport"];
    $date_rapport = $_POST["date_rapport"];
    $motif = $_POST["motif"];
    $bilan = $_POST["bilan"];

    // Création d'un nouvel objet Appartement avec les données mises à jour
    $rapport = new rapport(
        $id_rapport,
        $date_rapport,
        $motif,
        $bilan,
        null
    );

    // Initialisation de l'objet appartementBD pour accéder à la base de données
    $rapportBD = new rapportBD();

    // Mise à jour de l'appartement dans la base de données
    $resultat = $rapportBD->modifierRapport($rapport);

    // Vérification si la mise à jour a réussi
    if ($resultat) {
        // Redirection vers la page appropriée après la modification
        header("Location: ../vue/gererRapport.php");
        exit();
    } else {
        echo "Erreur : La modification de l'appartement a échoué. Veuillez réessayer.";
    }
}
?>
