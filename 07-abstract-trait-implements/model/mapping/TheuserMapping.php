<?php

namespace model\mapping;

use model\abstract\MappingClassAbstract;
use model\interface\securityInterface;

class TheuserMapping extends MappingClassAbstract implements securityInterface
{
    // propriétés
    private int $idTheUser;
    private string $loginTheUser;
    private string $pwdTheUser;
    private string $mailTheUser;


    // utilisations d'un trait pour slugifier une chaîne de caractères
    use \model\trait\slugifyTrait;

    // Le constructeur et l'hydratation sont gérés par la classe parente
    // extends MappingClassAbstract

    // méthode abstraite de la classe parente (MappingClassAbstract)
    // on doit obligatoirement l'implémenter
    // ici on va retourner une chaîne de caractères
    // qui représente l'objet avec ses propriétés
    public function __toString()
    {
        // TODO: Implement __toString() method.
        return "Je suis une instance de ".self::class." 
        et je suis un objet qui représente un utilisateur: ";
    }

    // méthodes de l'interface securityInterface
    // on doit obligatoirement les implémenter
    // ici on va retourner une chaîne de caractères
    // qui représente le hash du mot de passe
    public function hashPwd(string $pwd): string
    {
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        return $pwd;
    }

    // ici on va retourner un booléen
    // qui représente la vérification du mot de passe
    public function verifyPwd(string $pwd, string $hash): bool
    {
        $pwd = password_verify($pwd, $hash);
        return $pwd;
    }

    // getters
    public function getIdTheUser(): int
    {
        return $this->idTheUser;
    }

    public function getLoginTheUser(): string
    {
        return $this->loginTheUser;
    }

    public function getPwdTheUser(): string
    {
        return $this->pwdTheUser;
    }

    public function getMailTheUser(): string
    {
        return $this->mailTheUser;
    }

    // setters

    // setters de l'interface securityInterface
    // on doit obligatoirement les implémenter
    // ici on va setter le mot de passe crypté
public function setCryptPwd(string $pwdTheUser): void
    {
        $this->pwdTheUser = $this->hashPwd($pwdTheUser);
    }

    public function setIdTheUser(int $idTheUser): void
    {
        $this->idTheUser = $idTheUser;
    }

    public function setLoginTheUser(string $loginTheUser): void
    {
        $this->loginTheUser = $loginTheUser;
    }

    public function setPwdTheUser(string $pwdTheUser): void
    {
        $this->pwdTheUser = $pwdTheUser;
    }

    public function setMailTheUser(string $mailTheUser): void
    {
        $this->mailTheUser = $mailTheUser;
    }
}