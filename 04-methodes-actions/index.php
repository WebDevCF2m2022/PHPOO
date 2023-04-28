<?php
// chargement de la classe Personnage
require_once 'Personnage.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion Personnage</title>
</head>
<body>
<h1>Gestion Personnage</h1>
<h2>Création d'un Personnage</h2>
<p>On va instancier un Personnage via un formulaire créé à partir de la classe du même nom</p>
<form action="" method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" minlength="3" maxlength="18" required>
    <br>
    <label for="genre">Genre</label>
    <select name="genre" id="genre">
        <?php
        // on va parcourir le tableau ARRAY_GENRE de la classe Personnage pour créer les options du select
        foreach (Personnage::ARRAY_GENRE as $genre){
            echo "<option value='$genre'>$genre</option>";
        }
        ?>
    </select>
    <br>
    <label for="type">Types</label>
    <select name="type" id="type">
        <?php
        // on va parcourir le tableau ARRAY_TYPE de la classe Personnage pour créer les options du select
        foreach (Personnage::ARRAY_TYPE as $type){
            echo "<option value='$type'>$type</option>";
        }
        ?>
    </select>

    <input type="submit" value="Créer Personnage">
    <?php
    var_dump($_POST);
    ?>
</body>
</html>
<?php
