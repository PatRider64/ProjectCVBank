<?php
require_once 'includes/config.php';

if(!empty($_POST['name']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_retype'])) {
    $name = htmlspecialchars($_POST['name']);
    $firstname = htmlspecialchars($_POST['firstname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    $check = $bdd->prepare('SELECT nom, prenom, email, password FROM client WHERE email = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    $email = strtolower($email);

    if ($row == 0){
        if (strlen($name) <= 10){
            if (strlen($firstname) <= 10) {
                if (strlen($email) <= 50){
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if ($password === $password_retype) {
                            $cost = ['cost' => 12];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);

                            $insert = $bdd->prepare('INSERT INTO client(nom, prenom, email, password, token) VALUES(:name, :firstname, :email, :password, :token)');
                            $insert->execute(array(
                                'name' => $name,
                                'firstname' => $firstname,
                                'email' => $email,
                                'password' => $password,
                                'token' => bin2hex(openssl_random_pseudo_bytes(64))
                            ));
                            header('Location:inscription.php?reg_err=success');
                            die();
                        }else{ header('Location: inscription.php?reg_err=password'); die();}
                    }else{ header('Location: inscription.php?reg_err=email'); die();}
                }else{ header('Location: inscription.php?reg_err=email_length'); die();}
            }else{ header('Location: inscription.php?reg_err=firstname_length'); die();}
        }else{ header('Location: inscription.php?reg_err=name_length'); die();}
    }else{ header('Location: inscription.php?reg_err=already'); die();}
}