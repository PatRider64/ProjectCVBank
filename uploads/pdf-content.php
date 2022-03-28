<?php
    $req = $bdd->prepare('SELECT * FROM cv WHERE idClient = :idClient');
    $req->bindParam("idClient", $_GET["idClient"]);
    $req->execute();
    $data = $req->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>PDF</title>
</head>
    <body class="corps">
    <div class="cv-group">
        <p> Nom : <?=$data['nom']?></p>
    </div>
    <div class="cv-group">
        <p> Prénom : <?=$data['prenom']?></p>
    </div>
    <div class="cv-group">
        <p>Téléphone : <?=$data['noTelephone']?></p>
    </div>
    <div class="cv-group">
        <p>E-mail : <?=$data['email']?></p>
    </div>
    <div class="cv-group">
        <h2 class="titre">Formation</h2>
        <p><?=$data['formations']?></p>
    </div>
    <div class="cv-group">
        <h3 class="titre">Expérience professionnelle</h3>
        <p><?=$data['experienceProfessionnelle']?></p>
    </div>
    <div class="cv-group">
        <h4 class="titre">Compétences</h4>
        <p><?=$data['competences']?></p>
    </div>
    <div class="cv-group">
        <h5 class="titre">Centres d'intérêt</h5>
        <p><?=$data['centresInteret']?></p>
    </div>
    <div class="cv-group">
        <h6 class="titre">Langues</h6>
        <p><?=$data['langues']?></p>
    </body>
</html>