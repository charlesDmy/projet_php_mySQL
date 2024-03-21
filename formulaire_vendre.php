<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="confirmation_vendre.php" method="post">
        <div>
            <label for="modele">Modèle* : </label>
            <input type="" name="modele" id="modele" required>
        </div>

        <br>

        <div>
            <label for="etat">Etat* :</label>
                <select name="etat" id="etat" required>
                    <option value="Neuf">Neuf</option>
                    <option value="Usées">Usée</option>
                </select>
        </div>

        <br>

        <div>
            <label for="pointure">Pointure* :</label>
            <input type="" name="pointure" id="pointure" required>
        </div>

        <br>

        <div>
            <label for="prix">Prix* :</label>
            <input type="" name="prix" id="prix" required>
        </div>

        <br>

        <div>
                <label for='url'>Photo</label>
                <textarea name="url" id="url" cols="30" rows="10"></textarea>
        </div>

        <br>

        <div>
                <input type="submit" value="vendre">
        </div>
    </form>

</body>
</html>