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
                    <p>Votre CV a été déposé avec succès!</p>
                <?php
                }
                ?>
