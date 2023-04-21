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
    <?php
    $joueur1 = new Personnage("Humain","Luc");
    $joueur2 = new Personnage("Elf","Luka","Homme");

    var_dump($joueur1,$joueur2);
    ?>
</body>
</html>