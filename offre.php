<?php
require_once 'config.php';

$listeOffre = $bdd->prepare("SELECT * FROM offre where idOffre = $_GET[idOffre]");
$result = $listeOffre->execute();
$offre = $listeOffre->fetch();
?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Offre</title>
    </head>

    <body>
    <header>
        <h1 id="logo">CVBank</h1>
    </header>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="creationOffre.php">Créer une offre</a>
        <a href="voirOffre.php">Voir les offres</a>
        <a href="connexion.php">Connexion</a>
        <a href="monProfil.php">Mon Profil</a>
    </nav>
    <main>
        <div class = offre>
            <div class = offre-group>
                <h2 class="titre"><?=$offre['nomOffre']?></h2>
            </div>
            <div class = offre-group>
                <h3 class="titre">Description</h3>
                <p><?=$offre['description'] ?></p>
            </div>
            <div class = offre-group>
                <h4 class="titre">Compétences requises</h4>
                <p><?=$offre['competencesRequises'] ?></p>
            </div>
        </div>
    </main>
    <footer>
        <p>Références</p>
    </footer>
    </body>
    </html>