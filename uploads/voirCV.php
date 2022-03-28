<?php
session_start();
require_once 'includes/config.php';
$req = $bdd->prepare('SELECT * FROM cv WHERE idClient = :idClient');
$req->bindParam("idClient", $_GET["idClient"]);
$req->execute();
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
                <p> Nom : <?=$data['nom']?></p>
            </div>
            <div class="cv-group">
                <p> Prénom : <?=$data['prenom']?></p>
            </div>
            <div class="cv-group">
                <p>Téléphone : <?=$data['noTelephone']?></p>
            </div>
            <div class="cv-group">
                <p>E-mail : <?=$data['email']?></p>
            </div>
            <div class="cv-group">
                <h2 class="titre">Formation</h2>
                <p><?=$data['formations']?></p>
            </div>
            <div class="cv-group">
                <h3 class="titre">Expérience professionnelle</h3>
                <p><?=$data['experienceProfessionnelle']?></p>
            </div>
            <div class="cv-group">
                <h4 class="titre">Compétences</h4>
                <p><?=$data['competences']?></p>
            </div>
            <div class="cv-group">
                <h5 class="titre">Centres d'intérêt</h5>
                <p><?=$data['centresInteret']?></p>
            </div>
            <div class="cv-group">
                <h6 class="titre">Langues</h6>
                <p><?=$data['langues']?></p>
            </div>

        </div>
    </main>
    <footer>
        <p>Références</p>
    </footer>
    </body>
</html>
