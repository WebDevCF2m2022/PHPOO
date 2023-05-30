<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manager</title>
</head>
<body>
<h1>Manager</h1>
<?php
include "public_menu.php";
?>
<h3>Utilisateur dont l'id vaut 2</h3>
<?php
if (is_string($message)) {
    echo $message;
} else {
    echo $message->getIdTheMessage();
    echo "<br>";
    echo $message->getTitleTheMessage();
    echo "<br>";
    echo $message->getSlugTheMessage();
    echo "<br>";
    echo $message->getDateTheMessage();
    echo "<br>";
    echo $message->getMessageTheMessage();
    echo "<br>";
}
?>
<h3>Utilisateur dont l'id vaut 3</h3>
<?php
if (is_string($message2)) {
    echo $message2;
} else {
    echo $message2->getIdTheMessage();
    echo "<br>";
    echo $message2->getTitleTheMessage();
    echo "<br>";
    echo $message2->getSlugTheMessage();
    echo "<br>";
    echo $message2->getDateTheMessage();
    echo "<br>";
    echo $message2->getMessageTheMessage();
    echo "<br>";
}
?>
<h3>On veut afficher tous les messages</h3>
<?php
if (empty($messages)) {
    echo "Il n'y a pas d'utilisateur";
} else {
    foreach ($messages as $message) {
        echo $message->getIdTheMessage();
    echo "<br>";
    echo $message->getTitleTheMessage();
    echo "<br>";
    echo $message->getSlugTheMessage();
    echo "<br>";
    echo $message->getDateTheMessage();
    echo "<br>";
    echo $message->getMessageTheMessage();
    echo "<br>";
    }
}
?>
</body>
</html>
