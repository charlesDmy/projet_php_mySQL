<?php
// 5) Connexion à la base
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$nomBaseDeDonnees = "base_projet_sneakers";
 
// Connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $nomBaseDeDonnees);
if (!$connexion) {
    die("Connexion échouée : " . mysqli_connect_error());
}
// 6) Tester la validation formulaire

if(isset($_POST['valider'])){
    $email=$_POST['email'];
    $mot_de_passe=$_POST['mot_de_passe'];

    // 7) Vérifier l'existance de cette utilisateur en base (email, mot de passe)
    $sql= "SELECT * FROM compte_utilisateur WHERE email= '$email'  AND mot_de_passe= '$mot_de_passe'";
    $resultat = mysqli_query($connexion, $sql);

    if (mysqli_num_rows($resultat) >0) {
        
        session_start();
        $_SESSION['utilisateur']='ok';
        $_SESSION['role']= mysqli_fetch_array($resultat)[4];
        // 8) Rediriger vers page accueil-compte.php
        header('Location: index.php');
    } else {
        echo 'Identifiant incrorrect';
    } 
}



         
?>
<!-- // 1) balise HTML-->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>création_compte</title>
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"/>
</head>
<body>
    <main> 
        <!-- // 3) titre de la page -->
        <h2>Connexion compte utilisateur</h2>
        <!-- // 4)formulaire de creation de compte -->
        <form action="" method="post">

            <label for="">E-mail*</label>
            <input type="email" name="email" id="email" required>

            <label for="">Mot de passe*</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>

            <input type="submit" name="valider" value="Valider">

        </form>

<!-- // 2) fin des balises HTML -->
    </main>
</body>
</html>