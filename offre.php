<?php
require_once 'config.php';

$listeOffre = $bdd->prepare("SELECT * FROM offre where idOffre = :idOffre");
$listeOffre->bindParam("idOffre", $_GET["idOffre"]);
$listeOffre->execute();
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
        <button onclick="depotCV">Déposer votre CV</button>

        <script>
            function depotCV() {
                <?php
                session_start();
                $clientConnexion = $bdd->prepare("SELECT * FROM cv where idClient = :idClient");
                $clientConnexion->bindParam("idClient", $_GET["idClient"]);
                $clientConnexion->execute();
                $cv = $clientConnexion->fetch();

                if (!isset($_SESSION['user'])) {
                ?>
                <div class="text-center">
                    <p>Vous vous n'êtes pas connecté</p><br>
                    <a href="connexion.php">Se connecter</a>
                </div>
                <?php
                }
                if ($cv['idClient'] == null) {
                    ?>
                <div class="text-center">
                    <p>Vous n'avez pas encore créez de cv</p><br>
                    <a href="creationCV.php">Créer un CV</a>
                </div>>
                <?php
                }
                else {
                    $cv['idOffre'] = $_GET[idOffre];
                    ?>
                    <p>Votre CV a été déposé avec succés!</p>
                <?php
                }
                ?>
            }
        </script>
    </main>
    <footer>
        <p>Références</p>
    </footer>
    </body>
    </html>