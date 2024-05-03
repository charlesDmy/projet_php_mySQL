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
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleDetail.css">
</head>
<body>
<main>
    <head>
        <nav>
            <div class="titreAccueil">
                <a href="index.php">
                <h1 class="titre">STOCKZ</h1>    
                </a> 
            </div>
            <a href="formulaire_vendre.php">
            <button class="boutonVendre">VENDRE</button> 
            </a>  
        </nav>  
    </head>
    <div class="container">
        <?php if($resultat && mysqli_num_rows($resultat) > 0) : $chaussure = mysqli_fetch_assoc($resultat); ?>
           <div class="image"> <img src="<?= $chaussure['URL'] ?>" alt=""> </div> 
           <div class="modele"> Modèle : <?= $chaussure['modele'] ?> </div> 
           <div class="etat"> Etat : <?= $chaussure ['etat'] ?> </div> 
           <div class="prix"> Prix : <?= $chaussure['prix'] ?> </div> 
        <?php endif ?>

        <form method="post">
        <label for="choix">Pointure :</label>
        <select name="choix">
            <option value="option1">47</option>
            <option value="option2">41</option>
            <option value="option3">42</option>
        </select>
        </form>
        <br>

        <!-- id='. $chaussure (permet de mettre l'url pour que la page de modification la recupère et me permet connaitre l'id de la chaussure)  -->
        <a href="page_detail_modification.php? <?='id='.$id ?>">
                <button>modification</button>
        </a>
    </div>
    

</main>
 

</body>
</html>