<?php
// initialisation de la session
session_start();

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
    <link rel="stylesheet" href="styleDetail2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
            <div>
                 <!-- id='. $chaussure (permet de mettre l'url pour que la page de modification la recupère et me permet connaitre l'id de la chaussure)  -->
                 <?php if(isset($_SESSION['role']) && $_SESSION['role']=='admin') :?>
                    <a href="pageDetailModification.php? <?='id='.$id ?>">
                        <button class="boutonModification">MODIFICATION</button>
                    </a>
                <?php endif  ?>
                <a href="formulaireVendre.php">
                    <button class="boutonVendre">VENDRE</button> 
                </a>  
            </div>
            
        </nav>  
    </head>
    <div class="container">
        <?php if($resultat && mysqli_num_rows($resultat) > 0) : $chaussure = mysqli_fetch_assoc($resultat); ?>
           <div class="image"> <img src="<?= $chaussure['URL'] ?>" alt=""> </div> 
           <div class="infoChaussure">
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
            </div>
    </div>
          

        
    

</main>
 

</body>
</html>