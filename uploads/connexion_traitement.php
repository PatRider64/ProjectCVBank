<?php
    session_start();
    require_once 'includes/config.php';

    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $email = strtolower($email);
        $check = $bdd->prepare('SELECT nom, prenom, email, password, token FROM client WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if ($row > 0) {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if (password_verify($password, $data['password'])) {
                    $_SESSION['user'] = $data['token'];
                    header('Location: monProfil.php');
                    die();
                } else {
                    header('Location: connexion.php?login_err=password');
                    die();
                }
            } else {
                header('Location: connexion.php?login_err=email');
                die();
            }
        } else {
            header('Location: connexion.php?login_err=already');
            die();
        }
    } else {
        header('Location: connexion.php');
        die();
    }