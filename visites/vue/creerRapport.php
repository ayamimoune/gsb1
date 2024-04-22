<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un rapport</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Créer un rapport</h1>

    <button onclick="window.location.href='gererRapport.php'">Retour</button>

    <form action="../controleur/creerRapport.php" method="POST">
        <div>
            <label for="date_rapport">Date du rapport :</label>
            <input type="date" id="date_rapport" name="date_rapport" required>
        </div>
        <div>
            <label for="motif">Motif :</label>
            <input type="text" id="motif" name="motif" required>
        </div>
        <div>
            <label for="bilan">Bilan :</label>
            <textarea id="bilan" name="bilan" required></textarea>
        </div>
        <div>
            <button type="submit">Créer le rapport</button>
        </div>
    </form>
</body>
</html>
