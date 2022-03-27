<?php
require_once 'config.php';

if(!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['competences'])) {
    $name = htmlspecialchars($_POST['name']);
    $description = htmlspecialchars($_POST['description']);
    $competences = htmlspecialchars($_POST['competences']);

        if (strlen($name) <= 100){
            if (strlen($description) <= 500) {
                if (strlen($competences) <= 200) {
                            $insert = $bdd->prepare('INSERT INTO offre(nomOffre, description, competencesRequises) 
                            VALUES(:name, :description, :competences)');
                            $insert->execute(array(
                                'name' => $name,
                                'description' => $description,
                                'competences' => $competences,
                            ));
                            header('Location:creationOffre.php?reg_err=success');
                            die();
                }else{ header('Location: creationOffre.php?reg_err=competences_length'); die();}
            }else{ header('Location: creationOffre.php?reg_err=description_length'); die();}
        }else{ header('Location:creationOffre.php?reg_err=name_length'); die();}}