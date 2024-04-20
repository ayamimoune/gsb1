<?php
// Inclure les classes nécessaires avec les bons chemins
include_once "../modele/visiteurBD.php";
include_once "../modele/visiteur.php";

// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["password"])) {
    // Récupérer les valeurs du formulaire
    $login = $_POST["username"];
    $mdp = $_POST["password"];

    // Créer une instance de VisiteurBD pour gérer les opérations liées aux visiteurs
    $visiteurBD = new VisiteurBD();

    // Vérifier si le login correspond à un visiteur
    $visiteur = $visiteurBD->getVisiteurByLogin($login);

    // Vérifier si un visiteur a été trouvé avec ce login
    if ($visiteur) {
        // Récupérer le mot de passe du visiteur
        $mdpUtilisateur = $visiteur->getMdp();

        // Vérifier si le mot de passe saisi correspond au mot de passe du visiteur
        if ($mdp === $mdpUtilisateur) {
            // Authentification réussie
            session_start();
            $_SESSION["id_visiteur"] = $visiteur->getIdVisiteur();
            $_SESSION["nom"] = $visiteur->getNom();
            // Rediriger vers le tableau de bord du visiteur
            header("Location: ../vue/accueil.php");
            exit();
        } else {
            // Mot de passe incorrect
            $error = "Mot de passe incorrect.";
            include "../vue/connexion.php";
            exit();
        }
    } else {
        // Identifiant incorrect
        $error = "Identifiant incorrect.";
        include "../vue/connexion.php";
        exit();
    }
} else {
    // Afficher le formulaire de connexion par défaut si le formulaire n'est pas soumis
    include "../vue/connexion.php";
    exit();
}
?>
