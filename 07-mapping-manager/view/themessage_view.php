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
    <title>Utilisation mapping de themessage</title>
</head>
<body>
<h1>Utilisation mapping de themessage</h1>
<?php
include "public_menu.php";
?>
<?php
$message1 = new Themessage([]);
$message2 = new Themessage([
    'idThemessage'=>3,
    'titleTheMessage'=>'Lulu',
    'slugTheMessage'=>'lulu',
    'dateTheMessage'=>'mon@mail.com',
    'messageTheMessage'=>'messageTheMessage',
    'pourpre' => 'pourpre',
]);
try {
    $message3 = new Themessage([
        'titleTheMessage' => true,
        'slugTheMessage' => 'lulu',
        'dateTheMessage' => '21/03/2020',
        'messageTheMessage' => 'messageTheMessage',
        'pourpre' => 'pourpre',
    ]);
} catch (Exception $e) {
    echo "<p>{$e->getMessage()}</p>";
}

try {
    $message4 = new Themessage([
        'titleTheMessage' => 'Yes',
        'slugTheMessage' => 'lulu',
        'dateTheMessage' => 'mail.com',
        'messageTheMessage' => 'messageTheMessage',
    ]);
} catch (Exception $e) {
    echo "<p>{$e->getMessage()}</p>";
}

var_dump($message1,$message2);
?>
</body>
</html>
