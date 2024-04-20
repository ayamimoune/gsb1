<?php
// Inclure les classes nécessaires avec les bons chemins
include_once "../modele/visiteurBD.php";
include_once "../modele/connexionPDO.php";

// Vérifier si le formulaire d'inscription a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];
    $adresse = $_POST["adresse"];
    $tel = $_POST["tel"];
    $cp = $_POST["cp"];
    $ville = $_POST["ville"];

    // Créer une instance de VisiteurBD pour gérer les opérations liées aux visiteurs
    $visiteurBD = new VisiteurBD();

    // Créer un nouvel objet Visiteur avec les données du formulaire
    $nouveauVisiteur = new Visiteur(null, $nom, $prenom, $email, $login, $mdp, $adresse, $tel, $cp, $ville);

    // Ajouter le visiteur à la base de données
    $nouveauVisiteur = $visiteurBD->addVisiteur($nouveauVisiteur);

    // Rediriger l'utilisateur vers une page de confirmation ou autre après l'inscription
    header("Location: ../vue/connexion.php");
    exit();
} else {
    // Redirection vers la page d'inscription si le formulaire n'a pas été soumis correctement
    header("Location: ../vue/inscription.php");
    exit();
}
?>
