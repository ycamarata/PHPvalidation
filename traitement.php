<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = htmlspecialchars(trim($_POST['nom'] ?? '')); // trim pour nettoyer les données saisies par l'utilisateur et ?? our traiter les donner null en renvoyant une chaine
    $genre = htmlspecialchars(trim($_POST['genre'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $sujet = htmlspecialchars(trim($_POST['sujet'] ?? ''));
    $message = htmlspecialchars(trim($_POST['message'] ?? ''));

    $erreurs = [];

    if (empty($nom)) $erreurs[] = "Le champ 'Nom' est obligatoire."; //empty permet de valider si une variable est vide retournant un true/false pour valider par exemple ici le formulaire
    if (empty($genre) || !in_array($genre, ['homme', 'femme', 'autre'])) $erreurs[] = "Genre invalide."; //in_array permet de vérifier si une valeur est dans le tableau
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $erreurs[] = "Email invalide."; //!filter_var permets de filtrer les données sinon envoyer un message d'erreur
    if (empty($sujet)) $erreurs[] = "Le champ 'Sujet' est obligatoire.";
    if (empty($message)) $erreurs[] = "Le champ 'Message' est obligatoire.";

    if (!empty($erreurs)) {
        echo "<h1>Erreurs dans le formulaire</h1><ul>";
        foreach ($erreurs as $erreur) echo "<li>$erreur</li>";
        echo "</ul><a href='index.php'>Retour au formulaire</a>";
        exit;
    }

    session_start();
    $_SESSION['infos'] = compact('nom', 'genre', 'email', 'sujet', 'message');
    header('Location: infos.php'); // si tout est correcte renvoi sur la page info.php pour voir les données
    exit;
} else {
    header('Location: index.php'); // sinon renvoi sur le formulaire
    exit;
}
