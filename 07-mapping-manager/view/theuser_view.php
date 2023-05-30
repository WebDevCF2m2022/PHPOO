<?php
// on va tester la classe Theuser
use model\Theuser;
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
<h1>Utilisation mapping de theuser</h1>
<?php
include "public_menu.php";
?>
<?php
$user1 = new Theuser([]);
$user2 = new Theuser([
    'idTheUser'=>3,
    'loginTheUser'=>'Lulu',
    'pwdTheUser'=>'lulu',
    'mailTheUser'=>'mon@mail.com',
    'pourpre'=>'pourpre',
]);
try {
    $user3 = new Theuser([
        'loginTheUser' => true,
        'pwdTheUser' => 'lulu',
        'mailTheUser' => 'mon@mail.com',
        'pourpre' => 'pourpre',
    ]);
} catch (Exception $e) {
    echo "<p>{$e->getMessage()}</p>";
}

try {
    $user4 = new Theuser([
        'loginTheUser' => 'Yes',
        'pwdTheUser' => 'lulu',
        'mailTheUser' => 'mail.com',
        'pourpre' => 'pourpre',
    ]);
} catch (Exception $e) {
    echo "<p>{$e->getMessage()}</p>";
}

var_dump($user1,$user2);
?>
</body>
</html>
