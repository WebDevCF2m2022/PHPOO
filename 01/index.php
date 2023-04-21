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
    // création d'un lien symbolique vers la 2eme classe (pas un clône de la classe)
    $class3 = $class2;

    var_dump($class1,$class2,$class3);
    ?>

</body>
</html>