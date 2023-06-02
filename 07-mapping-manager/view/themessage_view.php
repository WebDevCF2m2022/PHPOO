<?php
// on va tester la classe Theuser
use model\Themessage;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Utilisation mapping de theuser</title>
</head>
<body>
    <h1>Utilisation mapping de themessage</h1>

    <?php
    include "public_menu.php";
    ?>

    <?php

    $message1 = new Themessage([]);
    $message2 = new Themessage([
        'idTheMessage' => 3,
        'titleTheMessage' => 'salut ça va,',
        'slugTheMessage' => 'salut-ca-va',
        'messageTheMessage' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint laboriosam consequatur nostrum recusandae consequuntur voluptatum, voluptatem architecto, quisquam, itaque incidunt nemo! Aliquam deleniti non fugiat commodi eos numquam facere nam',
        'TheMessageIdTheUser' => 1,
    ]);


    try{
        $message3 =  new Themessage([
            'idTheMessage' => 4,
            'titleTheMessage' => 'salut ça va,',
            'slugTheMessage' => 'salut-ca-va',
            'messageTheMessage' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint laboriosam consequatur nostrum recusandae consequuntur voluptatum, voluptatem architecto, quisquam, itaque incidunt nemo! Aliquam deleniti non fugiat commodi eos numquam facere nam',
            'TheMessageIdTheUser' => 8,
        ]);

    }catch(Exception $e){
        echo "<p>{$e->getMessage()}</p>";
    }


    try{
        $message4 =  new Themessage([
            'idTheMessage' => 3,
            'titleTheMessage' => 'salut ça va,',
            'slugTheMessage' => 'salut-ca-va',
            'dateTheMessage' => 'patate',
            'messageTheMessage' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint laboriosam consequatur nostrum recusandae consequuntur voluptatum, voluptatem architecto, quisquam, itaque incidunt nemo! Aliquam deleniti non fugiat commodi eos numquam facere nam',
            'TheMessageIdTheUser' => 8,
        ]);

    }catch(Exception $e){
        echo "<p>{$e->getMessage()}</p>";
    }


    var_dump($message1,$message2, $message3, $message4);