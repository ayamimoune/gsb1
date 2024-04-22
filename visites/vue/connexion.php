<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../connexion.css">
    <title>Connexion</title>
</head>
<div class="header">
        <a href="../index.php">Retour</a>
    </div>
<body>
    <h2>Connexion</h2>
    <form action="../controleur/connexion.php" method="post">
        <div>
            <label for="username">Nom d'utilisateur:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Connexion</button>
        </div>
        <div>
            <a href="inscription.php">Inscrivez-vous</a>
        </div>
        <?php if (isset($error)) { ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php } ?>
    </form>
</body>
</html>
