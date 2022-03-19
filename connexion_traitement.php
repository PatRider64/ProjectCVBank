<?php
    session_start();
    require_once 'config.php';

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $email = strtolower($email);
        $check = $bdd->prepare('SELECT nom, prenom, email, password FROM client where email = ?');
        $check->fetch();
        $row = $check->rowCount();

        if($row > 0) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                if(password_verify($password, $data['password'])) {
                    $_SESSION['user'] = $data['token'];
                    header('Location: landing.php');
                    die();
                } else {
                    header('Location: connexion.php?login_err=password');
                    die();
                }
            } else {
                header('Location: connexion.php?login_err=email');
                die();
            }
        }else {
            header('Location: connexion.php?login_err=already');
            die();
        }
    } else {
        header('Location: connexion.php');
        die();
    }