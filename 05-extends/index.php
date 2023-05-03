<?php
// chargement de la classe Personnage
require_once 'Personnage.php';
// chargement de la classe MagePersonnage
require_once 'MagePersonnage.php';

// pour la var_dump, création de la variable $perso
$perso = null;
$mage = null;
// on va tester si le formulaire a été soumis
if(isset($_POST['nom'],$_POST['genre'],$_POST['type'],$_POST['nomp'],$_POST['genrep'],$_POST['typep'])){
    // on va instancier un objet Personnage avec les données du formulaire passées en POST au constructeur
    $perso = new Personnage($_POST['typep'],$_POST['nomp'],$_POST['genrep']);
    // on va instancier un objet MagePersonnage avec les données du formulaire passées en POST au constructeur
    $mage = new MagePersonnage($_POST['type'],$_POST['nom'],$_POST['genre']);
}
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
<p>On va instancier un Personnage via un formulaire créé à partir de la classe Personnage</p>
<form action="" method="post">
    <label for="nom">Nom</label>
    <input type="text" name="nomp" id="nom" minlength="3" maxlength="18" required>
    <br>
    <label for="genre">Genre</label>
    <select name="genrep" id="genre">
        <?php
        // on va parcourir le tableau ARRAY_GENRE de la classe Personnage pour créer les options du select
        foreach (Personnage::ARRAY_GENRE as $genre){
            echo "<option value='$genre'>$genre</option>";
        }
        ?>
    </select>
    <br>
    <label for="type">Types</label>
    <select name="typep" id="type">
        <?php
        // on va parcourir le tableau ARRAY_TYPE de la classe Personnage pour créer les options du select
        foreach (Personnage::ARRAY_TYPE as $type){
            echo "<option value='$type'>$type</option>";
        }
        ?>
    </select>

<h2>Premier extends : Les Mages</h2>
<p>On va instancier un MagePersonnage via un formulaire créé à partir de la classe parent : Personnage</p>

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

    <input type="submit" value="Créer un Personnage et un Mage">
</form>
    <h5>var_dump($_POST,$perso);</h5>
    <?php
    var_dump($_POST,$perso,$mage);
    ?>

</body>
</html>
<?php
