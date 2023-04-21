<?php
// chargement des dépendances - sans autoloader, nos classes + config etc...
require "MaPremiereClass.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notre première classe</title>
</head>
<body>
    <h1>Notre première classe</h1>
    <p>On la nomme en Pascal (upper camel case) : MaPremiereClass</p>
    <h4>Important, pour la suite on nomme le fichier la contenant du même nom que la classe</h4>
    <h1>Instanciation</h1>
    <p>Pour instancier une classe, on va utiliser le mot clef new NomDeLaClasse()</p>
    <?php
    // instanciations de 2 classes
    $class1 = new MaPremiereClass();
    $class2 = new MaPremiereClass();
    // création d'un lien symbolique vers la 2eme classe (pas un clône de la classe) = ALIAS
    $class3 = $class2;

    var_dump($class1,$class2,$class3);
    ?>
    <h2>Attributs public</h2>
    <h4>Les propriétés visibles (public) des attributs permmettent de les lire et/ou écricre en dehors de la classe !</h4>
    <p>Affichage / modification Attributs publics</p>
    <p>$instance->nomDeLattribut = 5; // modification</p>
    <p>echo $instance->nomDeLattribut; // affichage</p>
    <?php
    // attribution d'une valeur a un attribut publique:
    $class1->premierAttribut = "coucou";
    // affichage d'un attribut publique
    echo $class1->premierAttribut;

    $class2->deuxiemeAttribut = 25;

    // création d'un attribut à la volée, dangereux et inutile, on pourra bloquer cette fonctionnalité !
    $class2->troisiemeAttribut = 50;

    ?>
<h2>Les constantes</h2>
<h4>Par défauts public, ne peuvent être modifiées, doivent être remplies à la création</h4>
<p>echo ClassName::CONSTANTE</p>
<p>Bonne pratique, depuis la class et non pas une instanciation</p>
    <?php
    // mauvaise pratique, affichage depuis l'instance
    echo $class2::PREMIERE_CONSTANTE;
    // bonne pratique, depuis la classe
    echo MaPremiereClass::PREMIERE_CONSTANTE;

    // Erreur fatale, on ne peut modifier une constante
    //MaPremiereClass::DEUXIEME_CONSTANTE = "coucou";

    
    ?>
<h2>Les Méthodes</h2>
<h4>Les méthodes publiques sont des actions qu'on peut utiliser en dehors de la class ou des instances de classe.</h4>
<p>echo $class1->helloWorld();</p>
<?php
echo $class1->helloWorld();

// erreur car non static
//echo MaPremiereClass::helloWorld();


var_dump($class1,$class2,$class3);
?>
</body>
</html>