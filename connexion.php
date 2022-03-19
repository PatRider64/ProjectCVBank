<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
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
    <main>
        <div class="login-form">
            <?php
            if(isset($_GET['login_err']))
            {
                $err = htmlspecialchars($_GET['login_err']);

                switch($err)
                {
                    case 'password':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> Mot de passe incorrect
                        </div>
                        <?php
                        break;

                    case 'email':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> Email incorrect
                        </div>
                        <?php
                        break;

                    case 'already':
                        ?>
                        <div class="alert alert-danger">
                            <strong>Erreur</strong> Compte non existant
                        </div>
                        <?php
                        break;
                }
            }
            ?>
            <div class = form>
                <h2 class="text-center">Connexion</h2>
                <form action="connexion.php" method="post">
                    <div class="form-group">
                        E-Mail: <input type="text" name="email"><br>
                    </div>
                    <div class="form-group">
                        Mot de passe: <input type="password" name="password"><br>
                    <div class="form-group">
                        <button type="submit">Connexion</button>
                    </div>
                </form>
            </div>
            <p class="text-center"><a href="inscription.php">Inscription</a></p>
        </div>
    </main>
    <footer>
        <p>Références</p>
    </footer>
</body>

