<?php
session_start();

// Vérifier si l'utilisateur est connecté en tant que propriétaire
if (!isset($_SESSION["id_visiteur"])) {
    header("Location: connexion.php");
    exit();
}

// Inclusion des fichiers nécessaires
include_once "../modele/connexionPDO.php";
include_once "../modele/rapportBD.php";

// Création d'une instance de RapportBD
$rapportBD = new RapportBD();

// Récupérer les rapports associés à l'utilisateur connecté
$id_visiteur = $_SESSION["id_visiteur"];
$rapports = $rapportBD->getRapportsByVisiteur($id_visiteur);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer mes rapports</title>
    <meta name="Author" content="Aya Mimoune">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../style/gererRapport.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
    <div class="header">
    <h1>Laboratoire Galaxy Swiss Bourdin</h1>
    <button onclick="window.location.href='accueil.php'">Retour</button>
    <button onclick="window.location.href='../controleur/deconnexion.php'">Déconnexion</button>

    </div>


    <h2>Liste des rapports</h2>

    <div class="content">
        <?php if ($rapports) : ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date du Rapport</th>
                        <th>Motif</th>
                        <th>Bilan</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rapports as $rapport) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($rapport->getIdRapport()); ?></td>
                            <td><?php echo htmlspecialchars($rapport->getDateRapport()); ?></td>
                            <td><?php echo htmlspecialchars($rapport->getMotif()); ?></td>
                            <td><?php echo htmlspecialchars($rapport->getBilan()); ?></td>
                            <td>
                                <button onclick="toggleEditMode(<?php echo $rapport->getIdRapport(); ?>)">Modifier</button>
                                <button href="../controleur/supprimerRapport.php?id_rapport=<?php echo $rapport->getIdRapport(); ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce rapport ?')">Supprimer</button>
                                <button onclick="window.location.href='creerRapport.php'">Créer un rapport </button>

                                <form id="form_<?php echo $rapport->getIdRapport(); ?>" style="display:none;" action="../controleur/modifierRapport.php" method="post">
                                    <input type="hidden" name="id_rapport" value="<?php echo $rapport->getIdRapport(); ?>">
                                    <label for="date_rapport">Date du Rapport:</label>
                                    <input type="date" id="date_rapport" name="date_rapport" value="<?php echo htmlspecialchars($rapport->getDateRapport()); ?>"><br>
                                    <label for="motif">Motif:</label>
                                    <input type="text" id="motif" name="motif" value="<?php echo htmlspecialchars($rapport->getMotif()); ?>"><br>
                                    <label for="bilan">Bilan:</label>
                                    <textarea id="bilan" name="bilan"><?php echo htmlspecialchars($rapport->getBilan()); ?></textarea><br>
                                    <input type="submit" value="Enregistrer">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p>Aucun rapport trouvé.</p>
        <?php endif; ?>
    </div>

    <script>
        function toggleEditMode(id_rapport) {
            const form = document.getElementById('form_' + id_rapport);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
</body>
</html>
