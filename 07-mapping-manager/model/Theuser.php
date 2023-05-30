<?php

namespace model;

// on veut utiliser Exception
use Exception;

class Theuser
{
    // propriétés
    private int $idTheUser;
    private string $loginTheUser;
    private string $pwdTheUser;
    private string $mailTheUser;

    // constructeur
    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }

    // hydratation (remplissage des propriétés en utilisant les setters)
    private function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            // création du nom du setter correspondant à la clé (convention de nommage), ucfirst met la première lettre en majuscule
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) { // si la méthode existe
                // utilisation du setter correspondant
                $this->$method($value);
                //echo "setter $method($value)<br>";
            }else{
                //echo "setter $method($value) n'existe pas<br>";
            }
        }
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
    public function setIdTheUser(int $idTheUser)
    {
        $this->idTheUser = $idTheUser;
    }

    public function setLoginTheUser(string $loginTheUser)
    {
        // on doit avoir plus de 3 caractères
        if($loginTheUser==="1"){
            throw new Exception("Le login ne peut pas être '1'");
        }
        elseif(strlen($loginTheUser) >= 3) {
            $this->loginTheUser = $loginTheUser;
        }else{
            throw new Exception("Le login doit contenir au moins 3 caractères");
        }
    }

    public function setPwdTheUser(string $pwdTheUser)
    {
        $this->pwdTheUser = $pwdTheUser;
    }

    public function setMailTheUser(string $mailTheUser)
    {
        // on doit avoir un mail valide
        if(filter_var($mailTheUser,FILTER_VALIDATE_EMAIL)===false){
            throw new Exception("Le mail n'est pas valide");
        }else{
            $this->mailTheUser = $mailTheUser;
        }
    }

}