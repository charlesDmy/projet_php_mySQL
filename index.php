<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>STOCKZ</h1>

    <h2>Ajout récent :</h2>

</body>
</html>

<?php
// Paramètres de connexion
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
echo "Connexion réussie à la base de données.";
}

// Exécuter une requête SELECT
$sql = "SELECT * FROM chaussure";
$resultat = mysqli_query($connexion, $sql);
// Vérifier si la requête a réussi
if ($resultat) {
print_r($resultat);
} else {
echo "Erreur : " . mysqli_error($connexion);
}
// Fermer la connexion
mysqli_close($connexion);


if ($resultat) {
    foreach ($resultat as $chaussure) {
        echo '<a href="page_detail.php?id='. $chaussure['id'] .' " >';
            echo 'ID :' . $chaussure['id'] .'<br>
            ' . 'Modèle : ' . $chaussure['modele'] . '<br>
            ' . 'Etat : ' . $chaussure ['etat'] . '<br>
            ' . 'Prix : ' . $chaussure['prix'] . ' €'. '<br>
            '  . '<img title="chaussure" src=' . $chaussure['URL'] . '></img>' . '<hr>
            ' ;

        echo'</a>';
        }
        echo "<br>";
          
} else {
    echo "0 résultats";
}

?>