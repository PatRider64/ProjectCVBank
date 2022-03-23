<?php
session_start();
require_once 'config.php';

$req = $bdd->prepare('SELECT * FROM cv WHERE idClient = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();
?>
<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>VoirCV</title>
    </head>

    <body class="corps">
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
            <div class="cv-group">
                <h2 class="titre">Nom</h2>
                <p><?=$data['nom']?></p>
            </div>
            <div class="cv-group">
                <h3 class="titre">Prénom</h3>
            </div>
            <div class="cv-group">
                <h4 class="titre">Formation</h4>
            </div>
            <div class="cv-group">
                <h5 class="titre">Expérience professionnelle</h5>
            </div>
            <div class="cv-group">
                <h6 class="titre">Compétences</h6>
            </div>
            <div class="cv-group">
                <h7 class="titre">Téléphone</h7>
            </div>
            <div class="cv-group">
                <h8 class="titre">E-mail</h8>
            </div>
            <div class="cv-group">
                <h9 class="titre">Centres d'intérêts</h9>
            </div>
            <div class="cv-group">
                <h10 class="titre">Langues</h10>
            </div>

        </div>
    </main>
    <footer>
        <p>Références</p>
    </footer>
    </body>
</html>
