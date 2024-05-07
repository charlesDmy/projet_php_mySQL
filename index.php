<?php
// initialisation de la session
session_start();
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
    <link rel="stylesheet" href="stylePageDaccueil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jaro:opsz@6..72&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Sedan+SC&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <h1 class="titre">STOCKZ</h1>
            <div>
                <a class="vendre" href="formulaireVendre.php">vendre</a>

                <?php if(isset($_SESSION['role'])) :?>
                    <a href="deconnexionCompteUtilisateur.php">
                        <button class="boutonDeconnexion">Deconnexion</button>
                    </a>
                <?php endif ?>

                <a href="connexionCompteUtilisateur.php">
                    <button class="boutonConnexion">Connexion</button>
                </a>
                <a href="creationCompteUtilisateur.php">
                    <button class="boutonInscription">S'inscrire</button>
                </a>
            </div>
              
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
                        <a href="pageDetail.php?id=<?= $chaussure['id'] ?>" >
                            <div> Modèle :  <?= $chaussure['modele'] ?> </div> 
                            <div> Etat : <?= $chaussure ['etat'] ?> </div>
                            <div class="prix"> Prix : <?= $chaussure['prix']. '€' ?> </div>
                            <div class="imageChaussure"> <img title="chaussure" src="<?= $chaussure['URL'] ?>" alt="" > </div>
                        </a>
                    </div>
                    
                <?php endforeach ?>
            <?php else : ?>
                0 resultat
            <?php endif ?>
        </div>
    </main>
</body>
</html>
