<?php

namespace model;

class Themessage
{
    // attributs
    private int $idTheMessage;
    private string $titleTheMessage;
    private string $slugTheMessage;
    private string $dateTheMessage;
    private string $messageTheMessage;
    private int $TheMessageIdTheUser;

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
            }
        }
    }

    // getters
    public function getIdTheMessage(): int
    {
        return $this->idTheMessage;
    }

    public function getTitleTheMessage(): string
    {
        return $this->titleTheMessage;
    }

    public function getSlugTheMessage(): string
    {
        return $this->slugTheMessage;
    }

    public function getDateTheMessage(): string
    {
        return $this->dateTheMessage;
    }

    public function getMessageTheMessage(): string
    {
        return $this->messageTheMessage;
    }

    public function getTheMessageIdTheUser(): int
    {
        return $this->TheMessageIdTheUser;
    }



    // setters

    public
    function setIdTheMessage(int $idTheMessage): void
    {
        $this->idTheMessage = $idTheMessage;
    }


    public
    function setTitleTheMessage(string $titleTheMessage): void
    {
        $this->titleTheMessage = $titleTheMessage;
    }


    public
    function setSlugTheMessage(string $slugTheMessage): void
    {
        $this->slugTheMessage = $slugTheMessage;
    }

    public
    function setDateTheMessage(string $dateTheMessage): void
    {
        // si la date est une date SQL valide
        if (date('Y-m-d H:i:s', strtotime($dateTheMessage)) == $dateTheMessage) {
            // on affecte la date
            $this->dateTheMessage = $dateTheMessage;
        } else {
            throw new \Exception("La date n'est pas valide");
        }

    }


    public
    function setMessageTheMessage(string $messageTheMessage): void
    {
        if(empty($messageTheMessage)){
            throw new \Exception("Le message ne peut pas être vide");
        }else{
            $this->messageTheMessage = $messageTheMessage;
        }

    }

    public
    function setTheMessageIdTheUser(int $TheMessageIdTheUser): void
    {
        $this->TheMessageIdTheUser = $TheMessageIdTheUser;
    }

}