<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1>
<?php
include "public_menu.php";
?>
<h3>Utilisateur dont l'id vaut 2</h3>
<?php
if (is_string($user)) {
    echo $user;
} else {
    echo $user->getIdTheUser();
    echo "<br>";
    echo $user->getLoginTheUser();
    echo "<br>";
    echo $user->getPwdTheUser();
    echo "<br>";
    echo $user->getMailTheUser();
    echo "<br>";
}
?>
<h3>Utilisateur dont l'id vaut 3</h3>
<?php
if (is_string($user2)) {
    echo $user2;
} else {
    echo $user2->getIdTheUser();
    echo "<br>";
    echo $user2->getLoginTheUser();
    echo "<br>";
    echo $user2->getPwdTheUser();
    echo "<br>";
    echo $user2->getMailTheUser();
    echo "<br>";
}
?>
<h3>On veut afficher tous les users</h3>
<?php
if (empty($users)) {
    echo "Il n'y a pas d'utilisateur";
} else {
    foreach ($users as $user) {
        echo $user->getIdTheUser();
        echo "<br>";
        echo $user->getLoginTheUser();
        echo "<br>";
        echo $user->getPwdTheUser();
        echo "<br>";
        echo $user->getMailTheUser();
        echo "<br>";
        echo "<br>";
    }
}
?>
</body>
</html>
