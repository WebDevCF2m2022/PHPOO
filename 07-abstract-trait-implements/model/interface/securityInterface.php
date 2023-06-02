<?php

namespace model\interface;

interface securityInterface
{
    // les enfants doivent implétenter ces propriétés et méthodes


    // méthode pour hasher un mot de passe
    function hashPwd(string $pwd): string;

    // méthode pour vérifier un mot de passe
    function verifyPwd(string $pwd, string $hash): bool;

    // méthode setter pour le mot de passe
    function setCryptPwd(string $pwdTheUser): void;
}