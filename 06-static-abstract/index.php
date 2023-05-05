<?php
// chargement de la classe Personnage
require_once 'Personnage.php';
// chargement de la classe MagePersonnage
require_once 'MagePersonnage.php';
// chargement de la classe GuerrierPersonnage
require_once 'GuerrierPersonnage.php';

// pour la var_dump, création des variables
$guerrier = null;
$mage = null;

// on va tester si le formulaire a été soumis
if(isset($_POST['nom'],$_POST['genre'],$_POST['type'],$_POST['nomp'],$_POST['genrep'],$_POST['typep'])){
    // on va instancier un objet GuerrierPersonnage avec les données du formulaire passées en POST au constructeur
    $guerrier = new GuerrierPersonnage($_POST['typep'],$_POST['nomp'],$_POST['genrep']);
    // on va instancier un objet MagePersonnage avec les données du formulaire passées en POST au constructeur
    $mage = new MagePersonnage($_POST['type'],$_POST['nom'],$_POST['genre']);
    // ceci est impossible car la classe Personnage est abstraite
    // $perso =  new Personnage($_POST['type'],$_POST['nom'],$_POST['genre']);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestion de Rôles</title>
</head>
<body>
<h1>Gestion de Rôles</h1>
<h2>Création d'un Guerrier</h2>
<p>On va instancier un GuerrierPersonnage via un formulaire créé à partir de la classe Personnage</p>
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

<h2>Création d'un Mage</h2>
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

    <input type="submit" value="Créer un Guerrier et un Mage">
</form>
<h2>classes abstraites</h2>
<p>Une classe abstraite est une classe qui ne peut pas être instanciée</p>
<p><code>abstract class Personnage</code></p>
<h3>Un méthode abstraite </h3>
<p>Une méthode abstraite est une méthode qui n'a pas de corps, ses enfants devront redéfinir la méthode</p>
<h4>Une méthode abstraite ne peut être créée que dans une classe abstraite</h4>
<p><code>abstract public function attaquer(Personnage $perso)</code></p>
<h3>Redéclaration dans les enfants</h3>
<p><code><pre>    // redéfinition de la méthode attaquer qui vient du parent Personnage
    public function attaquer(Personnage $cible): void
    {
        // TODO: Implement attaquer() method.
    }</pre></code></p>
<h2>static</h2>
<p>Une méthode statique permet d'être appelée comme une constante,
    sans instanciation de la classe et avec les ::</p>
<p><code><pre>Personnage::lanceDes()['total']</pre></code></p>
<?php
// on va lancer un dé avec la méthode statique lancerDe de la classe Personnage
echo "<p>Le dé a fait : ".Personnage::lanceDes()['total']."</p>";
// on va tester si le formulaire a été soumis
if(!is_null($guerrier) && !is_null($mage)){
    $mageAttaqueGuerrier = $mage->attaquer($guerrier);
    $guerrierAttaqueMage = $guerrier->attaquer($mage);
    echo "<h3>Le Mage attaque le Guerrier</h3>";
    echo "<p>{$mageAttaqueGuerrier['attaqueTotale']}</p>";
    echo "<h3>Le Guerrier attaque le Mage</h3>";
    echo "<p>{$guerrierAttaqueMage['attaqueTotale']}</p>";
    }
?>
<h5>var_dump($mageAttaqueGuerrier);</h5>
<?php
var_dump($mageAttaqueGuerrier);
?>
<h5>var_dump($guerrierAttaqueMage);</h5>
<?php
var_dump($guerrierAttaqueMage);
?>
    <h5>var_dump($_POST,$guerrier,$mage);</h5>
    <?php
    var_dump($_POST,$guerrier,$mage);
    // création de fichier textes pour stocker les données OU
    // ouverture des fichiers textes pour stocker les données
    // a+ : ouvre en lecture et écriture, et place le pointeur de fichier au début du fichier.
    // https://www.php.net/manual/fr/function.fopen.php
    $filePost = fopen('txt/post.txt','a+');
    $fileMage = fopen('txt/mage.txt','a+');
    $fileGuerrier = fopen('txt/guerrier.txt','a+');

    // on va écrire dans le fichier texte les données du formulaire
    fwrite($filePost, $_POST['nom']."\n".$_POST['genre']."\n".$_POST['type']."\n\r".$_POST['nomp']."\n"
        .$_POST['genrep']."\n".$_POST['typep']."\n\r");

    // on va écrire dans le fichier texte les données du Mage
    fwrite($fileMage, $mage->getNom()."\n".$mage->getGenre()."\n".
        $mage->getType().
        "\n".
        $mage->getMana().
        "\n".
        $mage->getPointDeVie().
        "\n".
        $mage->getPuissance().
        "\n".
        $mage->getDefense().
        "\n".
        $mage->getDexterite().
        "\n".
        $mage->getExperience()
        ."\n\r");
    ?>

</body>
</html>
<?php
