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
    echo "<p>On peut utiliser un setter en dehors de l'instance</p>";
    echo '<p>$joueur1->setType("Lulu"); // non valide</p>';
    $joueur1->setType("Lulu");
    echo '<p>$joueur1->setType("Nains"); valide</p>';
    $joueur1->setType("Nains");
    echo '<p>$joueur2->setType("Humains"); valide</p>';
    $joueur2->setType("Humains");

    $joueur3 = new Personnage("Humains","Jaoud");
    $joueur4 = new Personnage("Fantômes","Magib");
    $joueur5 = new Personnage("Orcs","Youssef","Oui");
    $joueur6 = new Personnage("Gobelins","Jo","Masculin");

    echo "<p>Getters</p>".'echo $joueur3->getNom() = '. $joueur3->getNom();
    echo "<p>".'echo $joueur3->getType() = '. $joueur3->getType()."</p>";
    echo "<hr><p>".'echo $joueur5->getNom() = '. $joueur5->getNom();
    echo "<p>".'echo $joueur5->getType() = '. $joueur5->getType()."</p>";
    echo "<p>".'echo $joueur5->getGenre() = '. $joueur5->getGenre()."</p>";

    var_dump($joueur1,$joueur2,$joueur3,$joueur4,$joueur5,$joueur6);

    ?>
</body>
</html>