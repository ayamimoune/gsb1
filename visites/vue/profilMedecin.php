<?php
session_start();

// Vérifier si l'utilisateur est connecté en tant que visiteur
if (!isset($_SESSION["id_visiteur"])) {
    header("Location: connexion.php");
    exit();
}

// Inclusion des fichiers nécessaires
include_once "../modele/connexionPDO.php";
include_once "../modele/medecinBD.php";

// Création d'une instance de MedecinBD
$medecinBD = new MedecinBD();

// Récupérer tous les médecins depuis la base de données
$medecins = $medecinBD->getAllMedecins();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil des Médecins</title>
    <meta name="Author" content="Aya Mimoune">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../style/profilMedecin.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
    <div class="header">
        <h1>Laboratoire Galaxy Swiss Bourdin</h1>
        <button onclick="window.location.href='accueil.php'">Retour</button>
        <button onclick="window.location.href='../controleur/deconnexion.php'">Déconnexion</button>
    </div>

    <h2>Liste des Médecins</h2>

    <div class="content">
        <?php if (!empty($medecins)) : ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Code postal</th>
                        <th>Ville</th>
                        <th>Téléphone</th>
                        <th>Spécialité Complémentaire</th>
                        <th>Mail</th>
                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($medecins as $medecin) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($medecin->getIdMedecin()); ?></td>
                            <td><?php echo htmlspecialchars($medecin->getNom()); ?></td>
                            <td><?php echo htmlspecialchars($medecin->getPrenom()); ?></td>
                            <td><?php echo htmlspecialchars($medecin->getAdresse()); ?></td>
                            <td><?php echo htmlspecialchars($medecin->getCp()); ?></td>
                            <td><?php echo htmlspecialchars($medecin->getVille()); ?></td>
                            <td><?php echo htmlspecialchars($medecin->getTel()); ?></td>
                            <td><?php echo htmlspecialchars($medecin->getSpecialiteComplementaire()); ?></td>
                            <td><?php echo htmlspecialchars($medecin->getMail()); ?></td>
                            <td>
                                <button onclick="contacterMedecin('<?php echo htmlspecialchars($medecin->getMail()); ?>')">Contacter</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Aucun médecin trouvé.</p>
        <?php endif; ?>
    </div>

    <script>
        function contacterMedecin(mail) {
            // Vous pouvez ajouter ici le code pour contacter le médecin via son email
            alert("Vous allez contacter le médecin à l'adresse : " + mail);
            // Exemple d'action : rediriger vers un formulaire de contact
             window.location.href = "formulaire_contact.php?dest=" + mail;
        }
    </script>
</body>
</html>
