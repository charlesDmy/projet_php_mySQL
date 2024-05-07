<?php
// 5) connexion a la BBD
$serveur = "localhost";
$utilisateur = "root";
$motdepasse = "";
$nomBaseDeDonnees = "base_projet_sneakers";
 
// Connexion à la base de données
$connexion = mysqli_connect($serveur, $utilisateur, $motdepasse, $nomBaseDeDonnees);
if (!$connexion) {
    die("Connexion échouée : " . mysqli_connect_error());
}
// 6) verification de la validation de formulaire

if(isset($_POST['valider'])){
    // 7) requete d'insertion dans la table compte
    $sql= 'INSERT INTO compte_utilisateur(nom, email, mot_de_passe,role) value ("'. $_POST['nom'] .'" , "'. $_POST['email'] .'" , "'. $_POST['mot_de_passe'] . '" , "' . $_POST['role'] .'")';
    // echo $sql;
	mysqli_query($connexion, $sql);
    
    // 8) redirection vers la page de connexion
    header('Location: index.php');
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
        <h1>Création de compte utilisateur</h1>
        <!-- // 4)formulaire de creation de compte -->
        <form action="" method="post">
            <label for="">Nom*</label>
            <input type="text" name="nom" id="nom" required>

            <label for="">E-mail*</label>
            <input type="email" name="email" id="email" required>

            <label for="">Mot de passe*</label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" required>
            
            <label for="role">Role :</label>
                    <select name="role">
                        <option value="admin">admin</option>
                        <option value="utilisateur">utilisateur</option>
                    </select>

            <input type="submit" name="valider" value="Valider">

        </form>

<!-- // 2) fin des balises HTML -->
    </main>
</body>
</html>