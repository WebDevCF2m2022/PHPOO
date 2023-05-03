<?php
// chargement de la classe Personnage
require_once 'Personnage.php';
// pour la var_dump, création de la variable $perso
$perso = null;
// on va tester si le formulaire a été soumis
if(isset($_POST['nom'],$_POST['genre'],$_POST['type'])){
    // on va instancier un objet Personnage avec les données du formulaire passées en POST au constructeur
    $perso = new Personnage($_POST['type'],$_POST['nom'],$_POST['genre']);
    //$perso->setPointDeVie("lulu");
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

    <input type="submit" value="Créer un Personnage">
    <h4>Lancement des dés 15x AVEC le tracing</h4>
    <p>Test de la méthode lanceDes(15) de la classe Personnage</p>
    <h5>var_dump($perso->lanceDes(15));</h5>
    <p><?php
    // si $perso est un objet
    if(is_object($perso)){
        // on lance les dés 15x
        $monLance = $perso->lanceDes(15);
        // on va afficher le résultat de la méthode lanceDes(15) de la classe Personnage en affichant le tra
        var_dump($monLance);
    }?></p>
    <h4>Lancement des dés 15x SANS tracing</h4>
    <p>Test de la méthode lanceDes(15) de la classe Personnage</p>
    <h5>var_dump($perso->lanceDes(15)['total']);</h5>
    <p>
        <?php
        // si $perso est un objet
        if(is_object($perso)){
            // on va afficher le total de la méthode lanceDes(15) de la classe Personnage en affichant que le total
            var_dump($monLance['total']);
        }
        ?>
    </p>
    <h5>var_dump($_POST,$perso);</h5>
    <?php
    var_dump($_POST,$perso);
    ?>
</form>
</body>
</html>
<?php
