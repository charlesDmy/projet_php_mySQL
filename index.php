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
       //echo "Connexion réussie à la base de données.";
       }
   
       // Exécuter une requête SELECT
       $sql = "SELECT * FROM chaussure";
       $resultat = mysqli_query($connexion, $sql);
       // Vérifier si la requête a réussi
       if ($resultat) {
       //print_r($resultat);
       } else {
       echo "Erreur : " . mysqli_error($connexion);
       }
       // Fermer la connexion
       mysqli_close($connexion);
?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_page_daccueil.css">

</head>
<body>
    <header>
        <nav>
            <h1 class="titre">STOCKZ</h1>
            <a href="formulaire_vendre.php">
            <button class="boutonVendre">VENDRE</button> 
            </a>  
        </nav>  
    </header>   
    <main>
        <div>
            <h2>Ajout récent :</h2>   
        </div>
        

        <div class="chaussuresContainer">
            <?php if($resultat) : ?>
                <?php foreach ($resultat as $chaussure) : ?>
                    <div class="chaussures">
                        <a href="page_detail.php?id=<?= $chaussure['id'] ?>" >
                            <div> Modèle :  <?= $chaussure['modele'] ?> </div> 
                            <div> Etat : <?= $chaussure ['etat'] ?> </div>
                            <div class="prix"> Prix : <?= $chaussure['prix'] ?> </div>
                            <div class="imageChaussure"> <img title="chaussure" src="<?= $chaussure['URL'] ?>" alt="" > </div>
                        </a>
                    </div>
                    
                <?php endforeach ?>
            <?php else : ?>
                0 resultat
            <?php endif ?>

            <?php


        ?>
        </div>
    </main>
    

</body>
</html>
