<!DOCTYPE html>
    <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="style.css">
            <title>CreationOffre</title>
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

                            case 'competences_length':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Liste des compétences requises trop longue
                            </div>
                            <?php
                            break;

                            case 'description_length':
                            ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> Description trop longue
                            </div>
                            <?php
                            break;

                            case 'name_length':
                            ?>
                            <div class="alert alert-danger">
                            <strong>Erreur</strong> Nom trop long
                            </div>
                        <?php
                        }
                    }
                    ?>

                    <form action="creation_traitement.php" method="post">
                        <h1 class="text-center">Création d'une offre</h1>
                        <div class = creation>
                            <div class="form-group">
                                Nom : <input type="text" name="name" class="form-control" required="required" autocomplete="off"><br>
                            </div>
                            <div class="form-group">
                                Description : <input type="text" width="500" height="500" name="description" class="form-control" required="required" autocomplete="off"<br>
                            </div>
                            <div class="form-group">
                                Compétences requises : <input type="text" size="100" name="competences" class="form-control" required="required" autocomplete="off"<br>
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