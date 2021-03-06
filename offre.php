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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>Offre</title>
        <script>
            function depotCV() {
                $.ajax({
                    url:"acceptationDepot.php",
                    type: "POST",
                    success:function(result){
                        alert(result);
                    }
                });
        </script>
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
        <form method="post" enctype="multipart/form-data">
            <div>
                <label for="file">Déposer votre CV</label><br>
                <input type="file" id="file" name="file" multiple>
            </div>
            <div>
                <button>Submit</button>
            </div>
        </form>

    </main>
    <footer>
        <p>Références</p>
    </footer>
    </body>
    </html>