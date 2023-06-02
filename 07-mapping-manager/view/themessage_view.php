<?php
// on va tester la classe Themessage
use model\Themessage;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Utilisation mapping de themessage</title>
</head>
<body>
<h1>Utilisation mapping de themessage</h1>
<?php
include "public_menu.php";
?>
<?php
try {
    $themessage1= new Themessage([]);
}catch (Exception $e){
    echo "<p>{$e->getMessage()}</p>";
}

try {
    $themessage2 = new Themessage([
    'idTheMessage'=>3,
    'titleTheMessage'=>'Lulu',
    'slugTheMessage'=>'lulu',
    'dateTheMessage'=>'2023-06-02 03:28:17',
    'messageTheMessage'=>"coucou les loulous",
    'TheMessageIdTheUser'=>1,
    'pourpre'=>'pourpre',
]);
} catch (Exception $e) {
    echo "<p>{$e->getMessage()}</p>";
}
try {
    $themessage3 = new Themessage([
        'idTheMessage'=>3,
        'titleTheMessage'=>'Lulu',
        'slugTheMessage'=>'lulu',
        'dateTheMessage'=>'mon@mail.com',
        'messageTheMessage'=>"coucou les loulous",
        'TheMessageIdTheUser'=>1,
        'pourpre'=>'pourpre',
    ]);
} catch (Exception $e) {
    echo "<p>{$e->getMessage()}</p>";
}

try {
    $themessage4 = new Themessage([
        'idTheMessage'=>3,
        'titleTheMessage'=>'Lulu',
        'slugTheMessage'=>'lulu',
        'dateTheMessage'=>'2023-05-28 17:28:00',
        'messageTheMessage'=>"",
        'TheMessageIdTheUser'=>1,
        'pourpre'=>'pourpre',
    ]);
} catch (Exception $e) {
    echo "<p>{$e->getMessage()}</p>";
}

var_dump($themessage1,$themessage2,/*$themessage3,$themessage4*/);
?>
</body>
</html>
