<?php
// chargement des dépendances - sans autoloader, nos classes + config etc...
require "MaDeuxiemeClass.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisation du constructeur</title>
</head>
<body>
    <h1>Utilisation du constructeur</h1>
    <p>Le constructeur est une méthode publique appelée automatiquement lors de l'instanciation d'une classe, elle permet de passer des paramètres () à notre instance de classe</p>
    <p>public function __construct($arg){}</p>
    <p>Pour instancier une classe, on va toujours utiliser le mot clef new NomDeLaClasse()</p>
    <p>On passe 2 paramètres au constructeur de la classe, ce qui va changer les valeurs des attributs immédiatement avec $this->premierAttribut = ... (relativement mauvaise pratique)</p>
    <p>$class1 = new MaDeuxiemeClass(1,2);<br>
    $class2 = new MaDeuxiemeClass("coucou","ça va?")</p>
    <?php
    // instanciations de 2 classes
    $class1 = new MaDeuxiemeClass(1,2);
    $class2 = new MaDeuxiemeClass("coucou","ça va?");

    // Impossible car private
    //$class1->premierAttribut = "coucou";
    //echo $class1->premierAttribut;

    echo MaDeuxiemeClass::PREMIERE_CONSTANTE;

    // Impossible car private
    //echo MaDeuxiemeClass::DEUXIEME_CONSTANTE;

    var_dump($class1,$class2);
    ?>
</body>
</html>