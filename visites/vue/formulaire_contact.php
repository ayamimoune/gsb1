<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de Contact</title>
    <meta name="Author" content="Aya Mimoune">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="../style/formulaire_contact.css" type="text/css" rel="stylesheet" media="all">
</head>
<body>
    <div class="header">
        <h1>Contactez le Médecin</h1>
        <button onclick="window.location.href='profilMedecin.php'">Retour</button>
        <button onclick="window.location.href='../controleur/deconnexion.php'">Déconnexion</button>
    </div>

    <div class="content">
        <form action="../controleur/envoyer_message.php" method="post">
            <input type="hidden" name="destinataire" value="<?php echo htmlspecialchars($_GET['dest']); ?>">
            <label for="message">Message :</label><br>
            <textarea id="message" name="message" rows="5" cols="40"></textarea><br>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>
</html>
