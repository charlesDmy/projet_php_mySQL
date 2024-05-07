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
        $modele = $chaussure['modele'];

    } else {
        echo "Aucun résultat trouvé pour cet ID.";
    }
} else {
    echo "Aucun ID n'a été spécifié dans l'URL.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylePageModification.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<head>
        <nav>
            <div class="titreAccueil">
                <a href="index.php">
                <h1 class="titre">STOCKZ</h1>    
                </a> 
            </div>
            <a href="formulaireVendre.php">
            <button class="boutonVendre">VENDRE</button> 
            </a>  
        </nav>  
    </head>
    <div class="containerFormulaire">
        <div class="containerEnfant">
           <form action="#" method="post">
            <div class="modele">
                <label for="modele">Modèle : </label>
                <?php
                    echo '<input type="" name="modele" id="modele" value="'.$modele.'">'
                ?>
            </div>

            <br>

            <div class="etat">
                <label for="etat">Etat :</label>
                <select name="etat" id="etat" >
                    <option value="Neuf">Neuf</option>
                    <option value="Usées">Usée</option>
                </select>
            </div>

            <br>

            <div class="pointure">
                <label for="pointure">Pointure :</label>
                <input type="" name="pointure" id="pointure" >
            </div>

            <br>

            <div>
                <label for="prix">Prix :</label>
                <input type="" name="prix" id="prix" >
            </div>

            <br>

            <div>
                <label for='url'>Photo</label>
                <textarea name="url" id="url" cols="30" rows="10"></textarea>
            </div>

            <br>

            <div>
                <input type="submit" value="modifier">
            </div>
        </form> 
        </div>
        
    </div>
        
</body>
</html>
