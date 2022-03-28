<?php
    session_start();
    require_once 'includes/config.php';

    $req = $bdd->prepare('SELECT * FROM client WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>CreationCV</title>
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
    <div class="offre-form">
        <?php
        if(isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch($err) {
                case 'success':
                    ?>
                    <div class="alert alert-success">
                        <strong>Succès</strong> Création réussie !
                    </div>
                    <?php
                    break;

                case 'formation_length':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Longueur de la formation trop longue
                    </div>
                    <?php
                    break;

                case 'experience_length':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Description de l'expérience professionnelle trop longue
                    </div>
                    <?php
                    break;

                case 'competences_length':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Liste des compétences trop longue
                    </div>
                <?php
                    break;

                case 'telephone_length':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Numéro de téléphone trop long
                    </div>
                <?php
                    break;

                case 'interets_length':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Liste des centres d'intérêts trop long
                    </div>
                <?php
                    break;

                    break;

                case 'langues_length':
                    ?>
                    <div class="alert alert-danger">
                        <strong>Erreur</strong> Liste des langues trop long
                    </div>
                <?php
            }
        }
        ?>

        <form action="creationCV_traitement.php" method="post">
            <h1 class="text-center">Création d'un CV</h1>
            <div class = creation>
                <div class="form-group">
                    Nom : <?=$data['nom']?><br>
                </div>
                <div class="form-group">
                    Prénom : <?=$data['prenom']?><br>
                </div>
                <div class="form-group">
                    Formation : <input type="text" width="500" height="500" name="formation" class="form-control" required="required" autocomplete="off"<br>
                </div>
                <div class="form-group">
                    Experience professionnelle : <input type="text" size="100" width="500" height="500" name="experience" class="form-control" required="required" autocomplete="off"<br>
                </div>
                <div class="form-group">
                    Compétences : <input type="text" size="100" width="500" height="500" name="competences" class="form-control" required="required" autocomplete="off"<br>
                </div>
                <div class="form-group">
                    Numéro de telephone : <input type="tel" size="100" width="500" height="500" name="telephone" pattern="[0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2} [0-9]{2}" class="form-control" required="required" autocomplete="off"<br>
                </div>
                <div class="form-group">
                    E-mail : <?=$data['email']?><br>
                </div>
                <div class="form-group">
                    Centres d'intérêt : <input type="text" size="100" width="500" height="500" name="interets" class="form-control" required="required" autocomplete="off"<br>
                </div>
                <div class="form-group">
                    Langues : <input type="text" size="100" name="langues" class="form-control" required="required" autocomplete="off"<br>
                </div>
                <div>
                    <button type="submit">Création</button>
                </div>
        </form>
    </div>
</main>
<footer>
    <p>Références</p>
</footer>
</body>
</html>
