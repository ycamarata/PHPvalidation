<?php
session_start();
if (!isset($_SESSION['infos'])) {
    header('Location: index.php');
    exit;
}

$infos = $_SESSION['infos'];
unset($_SESSION['infos']);
?>

<?php include 'header.php'; ?>

<h1 class="text-center">Informations de l'utilisateur</h1>

<div class="mt-4 p-4 border rounded shadow-sm bg-white">
    <p><strong>Votre nom :</strong> <?= $infos['nom'] ?></p>
    <p><strong>Votre adresse mail :</strong> <?= $infos['email'] ?></p>
    <p><strong>Genre :</strong> <?= ucfirst($infos['genre']) ?></p> <!-- ucfirst renvoi la première lettre en majuscule-->
    <p><strong>Le sujet :</strong> <?= $infos['sujet'] ?></p>
    <p><strong>Le message :</strong> <?= nl2br($infos['message']) ?></p> <!--nl2br renvoi des <br> pour l'affichage en html -->
</div>
<div class="text-center mt-4">
    <a href="index.php" class="btn btn-primary">Retour au formulaire</a>
</div>

<?php include 'footer.php'; ?>
