<?php
    require_once 'includes/config.php';

    $listeNomOffre = $bdd->prepare("SELECT idOffre, nomOffre FROM offre");
    $result = $listeNomOffre->execute();
    $offres = $listeNomOffre->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>VoirOffre</title>
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
            <div class = offre-vue>
                <ul>
                    <?php
                        foreach ($offres as $offre):
                        ?>
                           <li><a href="offre.php?idOffre=<?= $offre['idOffre'] ?>"><?= $offre['nomOffre']?></a></li>
                    <?php
                        endforeach;
                    ?>
                </ul>
            </div>
        </main>
        <footer>
            <p>Références</p>
        </footer>
    </body>
</html>