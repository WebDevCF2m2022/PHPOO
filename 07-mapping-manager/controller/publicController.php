<?php

// on va tester la classe Theuser
use model\Theuser;

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
    echo $e->getMessage();
}

var_dump($user1,$user2);
