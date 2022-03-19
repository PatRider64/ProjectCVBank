<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="style.css">
            <title>Inscription</title>
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
                if(isset($_GET['reg_err'])) {
                    $err = htmlspecialchars($_GET['reg_err']);

                    switch($err) {
                        case 'success':
                            ?>
                            <div class="alert alert-success">
                                <strong>Succès</strong> Inscription réussie !
                            </div>
                            <?php
                            break;

                        case 'password':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Mot de passe différent
                            </div>
                            <?php
                            break;

                        case 'email':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Email non valide
                            </div>
                            <?php
                            break;

                        case 'email_length':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Email trop long
                            </div>
                            <?php
                            break;

                        case 'name_length':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Nom trop long
                            </div>
                            <?php
                            break;

                        case 'firstname_length':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Prénom trop long
                            </div>
                        <?php
                        case 'already':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Compte deja existant
                            </div>
                        <?php

                    }
                }
                ?>
                <form action="inscription_traitement.php" method="post">
                    <h1 class="text-center">Inscription</h1>
                    <div class = inscription>
                        <div class="form-group">
                            Nom : <input type="text" name="name" class="form-control" required="required" autocomplete="off"><br>
                        </div>
                        <div class="form-group">
                            Prénom: <input type="text" name="firstname" class="form-control" required="required" autocomplete="off"<br>
                        </div>
                        <div class="form-group">
                            E-mail: <input type="email" name="email" class="form-control" required="required" autocomplete="off"<br>
                        </div>
                        <div class="form-group">
                            Mot de passe: <input type="password" name="password" class="form-control" required="required" autocomplete="off"<br>
                        </div>
                        <div class="form-group">
                            Re-tapez le mot de passe: <input type="password" name="password_retype" class="form-control" required="required" autocomplete="off"><br>
                        </div>
                        <div>
                            <button type="submit">Inscription</button>
                        </div>
                </form>
            </div>
        </main>
        <footer>
            <p>Reférences</p>
        </footer>
    </body>
</html>