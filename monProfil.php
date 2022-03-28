<?php
    session_start();
    require_once 'config.php';

    $req = $bdd->prepare('SELECT * FROM client WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

?>
<!Doctype html>
<html lang="fr">
<head>
    <title>Mon profil</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href=style.css>
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
    <main class="corps">
        <div class="container">
            <div class="col-md-12">
                <?php
                    if (!isset($_SESSION['user'])) {
                        ?>
                    <div class="text-center">
                        <h1>Vous vous n'êtes pas connecté</h1><br>
                        <a href="connexion.php">Se connecter</a>
                    </div>
                    <?php
                    }
                    else {
                        ?>
                        <div class="text-center">
                            <h2>Bonjour <?php echo $data['prenom'], ' ', $data['nom']; ?> !</h2><br>
                            <a href="voirCV.php?idClient=<?=$data['idClient']?>">Voir votre CV</a>
                            <a href="creationCV.php">Créez votre CV</a>
                            <hr/>
                            <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
                            </div>
                        <?php
                    }
                ?>
            </div>
        </div>
    </main>
    <footer>
        <p>Références</p>
    </footer>
</body>
</html>