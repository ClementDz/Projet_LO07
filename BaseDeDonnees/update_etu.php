<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd;charset=utf8', 'root', '');

    if (isset($_POST['nom'])) {
        $etudiant = $_POST['nom'];
    }

    // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('UPDATE etudiant SET nom = :nom, prenom=:prenom, num_etu=:num_etu, admi=:admi, filiere=:filiere, email=:email WHERE nom="' . $etudiant . '"');
    $req->execute(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'num_etu' => $_POST['num_etu'],
        'admi' => $_POST['admi'],
        'filiere' => $_POST['filiere'],
        'email' => $_POST['email']
    ));
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}



// Redirection du visiteur vers la page du minichat
header('Location: ../PagesWeb/page_etudiant.php');
//mysql_query($sql) or die(mysql_error());
?>