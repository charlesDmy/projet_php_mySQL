<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_detail.css">
</head>
<body>
</body>
</html>
<?php

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "base_projet_sneakers";

// Établir la connexion
$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if (!$connexion) {
    die("Échec de la connexion : " . mysqli_connect_error());
}

// Vérifier si l'ID est présent dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Récupérer et échapper l'ID pour éviter les injections SQL
    $id = mysqli_real_escape_string($connexion, $_GET['id']);

    // Préparer la requête SQL
    $sql = "SELECT * FROM chaussure WHERE id = '$id'";

    // Exécuter la requête SQL
    $resultat = mysqli_query($connexion, $sql);


    if ($resultat && mysqli_num_rows($resultat) > 0) {
        $chaussure = mysqli_fetch_assoc($resultat);

        echo '<img title="chaussure" src=' . $chaussure['URL'] . '></img>' . '<br>
        ' . 'Modèle : ' . $chaussure['modele'] . '<br>
        ' . 'Etat : ' . $chaussure ['etat'] . '<br>
        ' . 'Pointure : ' . $chaussure['pointure'] . '<br>
        ' . 'Prix : ' . $chaussure['prix'] . ' €';
    } else {
        echo "Aucun résultat trouvé pour cet ID.";
    }
} else {
    echo "Aucun ID n'a été spécifié dans l'URL.";
}

?>

<form method="post">
    <button type="submit" name="submit">Acheter à $chaussure['prix']</button>
</form>
mysqli_close($connexion);
?>