<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "base_projet_sneakers";
// Établir la connexion
$connexion = mysqli_connect($serveur, $utilisateur,
$mot_de_passe, $base_de_donnees);
// Vérifier la connexion
if (!$connexion) {
die("Échec de la connexion : " . mysqli_connect_error());
} else {
    // $_POST est t-il vide ?
    if(empty($_POST)){
        echo 'le formulaire n\'a pas été soumis correctement';
        exit();
    } else {
        echo 'la vente a bien était prise en compte';
        $modele = mysqli_real_escape_string($connexion, $_POST['modele']);
        $etat = mysqli_real_escape_string($connexion, $_POST['etat']);
        $pointure = mysqli_real_escape_string($connexion, $_POST['pointure']);
        $prix = mysqli_real_escape_string($connexion, $_POST['prix']);
        $url = mysqli_real_escape_string($connexion, $_POST['url']);

        $sql= "INSERT INTO chaussure( modele, etat, pointure, prix, url) VALUES ('$modele','$etat','$pointure','$prix','$url')";
        mysqli_query($connexion, $sql);
        
    }

}


?> 
<br>
<a href="index.php">
    <button>ACCUEIL</button>    
</a>
