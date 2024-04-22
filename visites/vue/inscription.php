<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../style.css">
</head>
<div class="header">
        <a href="../index.php">Retour</a>
    </div>
<body>
    <div class="container">
        <h2>Inscription</h2>
        <form action="../controleur/inscription.php" method="POST">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="login">Login :</label>
                <input type="text" id="login" name="login" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe :</label>
                <input type="password" id="mdp" name="mdp" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse :</label>
                <input type="text" id="adresse" name="adresse" required>
            </div>
            <div class="form-group">
                <label for="tel">Téléphone :</label>
                <input type="text" id="tel" name="tel" required>
            </div>
            <div class="form-group">
                <label for="cp">Code postal :</label>
                <input type="text" id="cp" name="cp" required>
            </div>
            <div class="form-group">
                <label for="ville">Ville :</label>
                <input type="text" id="ville" name="ville" required>
            </div>

            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
