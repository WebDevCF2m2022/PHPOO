<?php
require_once "Personnage.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Getters et setters</title>
</head>
<body>
    <h1>Getters et setters</h1>
    <h2>Utilisation d'une classe Personnage</h2>
    <p>Lecture d'une constante publique</p>
    <p>echo Personnage::NB_FACE_DE</p>
    <?php
    echo Personnage::NB_FACE_DE;
    echo "<br>";
    ?>
    <?php
    $joueur1 = new Personnage("Humain","Luc");
    $joueur2 = new Personnage("Elf","Luka","Homme");
    echo $joueur1->isAlive();
    echo "<br>";
    echo $joueur2->isAlive();
    echo "<p>Joueur1 a {$joueur1->getPointDeVie()} points de vie</p>";

    var_dump($joueur1,$joueur2);
    ?>
</body>
</html>