<?php
session_start();
require_once 'config.php';

if(!isset($_SESSION['user'])){
    header('Location:connexionInscription.php');
    die();
}

$req = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

?>
<!Doctype html>
<html lang="fr">
<head>
    <title>Espace membre</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href=style.css>
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
    </nav>
    <main class="corps">
    <div class="container">
        <div class="col-md-12">
            <?php
            if(isset($_GET['err'])){
                $err = htmlspecialchars($_GET['err']);
                switch($err){
                    case 'current_password':
                        echo "<div class='alert alert-danger'>Le mot de passe actuel est incorrect</div>";
                        break;

                    case 'success_password':
                        echo "<div class='alert alert-success'>Le mot de passe a bien été modifié ! </div>";
                        break;
                }
            }
            ?>

            <div class="text-center">
                <h1 class="p-5">Bonjour <?php echo $data['prenom'], $data['nom']; ?> !</h1>
                <hr/>
                <a href="deconnexion.php" class="btn btn-danger btn-lg">Déconnexion</a>
            </div>
        </div>
    </div>
    </main>
    <footer>
        <p>Références</p>
    </footer>
</body>
</html>