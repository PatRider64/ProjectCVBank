<?php
    require_once 'config.php';
    session_start();

    $req = $bdd->prepare('SELECT idClient, nom, prenom, email FROM client WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();

    if (!empty($_POST['formation']) && !empty($_POST['experience']) && !empty($_POST['competences']) && !empty($_POST['telephone']) && !empty($_POST['interets'])
    && !empty($_POST['langues'])) {
        $formation = htmlspecialchars($_POST['formation']);
        $experience = htmlspecialchars($_POST['experience']);
        $competences = htmlspecialchars($_POST['competences']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $interets = htmlspecialchars($_POST['interets']);
        $langues = htmlspecialchars($_POST['langues']);

        if (strlen($formation) <= 50) {
            if (strlen($experience) <= 500) {
                if (strlen($competences) <= 200) {
                    if (strlen($telephone) <= 30) {
                        if (strlen($interets) <= 150) {
                            if (strlen($langues) <= 60) {
                                $insert = $bdd->prepare('INSERT INTO cv(nom, prenom, formations, experienceProfessionnelle, competences, noTelephone, email, 
                                centresInteret , langues, idClient) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
                                $insert->execute(array(
                                    $data['nom'],
                                    $data['prenom'],
                                    $formation,
                                    $experience,
                                    $competences,
                                    $telephone,
                                    $data['email'],
                                    $interets,
                                    $langues,
                                    $data['idClient'],
                                ));
                                header('Location:creationCV.php?reg_err=success');
                                die();
                            } else {
                                header('Location: creationCV.php?reg_err=langues_length');
                                die();
                            }
                        } else {
                            header('Location: creationCV.php?reg_err=interets_length');
                            die();
                        }
                    } else {
                        header('Location: creationCV.php?reg_err=telephone_length');
                        die();
                    }
                } else {
                    header('Location: creationCV.php?reg_err=competences_length');
                    die();
                }
            } else {
                header('Location: creationCV.php?reg_err=experience_length');
                die();
            }
        } else {
            header('Location:creationCV.php?reg_err=formation_length');
            die();
        }
    }