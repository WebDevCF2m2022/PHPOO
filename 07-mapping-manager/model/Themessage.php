<?php

namespace model;

// on veut utiliser Exception
use Exception;

class Themessage
{
    // propriétés
    private int $idTheMessage;
    private string $titleTheMessage;
    private string $slugTheMessage;
    private string $dateTheMessage;
    private string $messageTheMessage;

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

    /**
     * Get the value of idTheMessage
     */
    public function getIdTheMessage(): int
    {
        return $this->idTheMessage;
    }

    /**
     * Set the value of idTheMessage
     */
    public function setIdTheMessage(int $idTheMessage): self
    {
        
        $this->idTheMessage = $idTheMessage;

        return $this;
    }

    /**
     * Get the value of titleTheMessage
     */
    public function getTitleTheMessage(): string
    {
        return $this->titleTheMessage;
        
    }

    /**
     * Set the value of titleTheMessage
     */
    public function setTitleTheMessage(string $titleTheMessage): self
    {

        if($titleTheMessage==="1"){
            throw new Exception("Le login ne peut pas être '1'");
        }
        elseif(strlen($titleTheMessage) >= 3) {
            $this->titleTheMessage = $titleTheMessage;
        }else{
            throw new Exception("Le login doit contenir au moins 3 caractères");
        }
       

        return $this;
    }

    /**
     * Get the value of slugTheMessage
     */
    public function getSlugTheMessage(): string
    {
        return $this->slugTheMessage;
    }

    /**
     * Set the value of slugTheMessage
     */
    public function setSlugTheMessage(string $slugTheMessage): self
    {
        $this->slugTheMessage = $slugTheMessage;

        return $this;
    }

    /**
     * Get the value of dateTheMessage
     */
    public function getDateTheMessage(): string
    {
        return $this->dateTheMessage;
    }

    /**
     * Set the value of dateTheMessage
     */
    public function setDateTheMessage(string $dateTheMessage): self
    {
        $this->dateTheMessage = $dateTheMessage;

        return $this;
    }

    /**
     * Get the value of messageTheMessage
     */
    public function getMessageTheMessage(): string
    {
        return $this->messageTheMessage;
    }

    /**
     * Set the value of messageTheMessage
     */
    public function setMessageTheMessage(string $messageTheMessage): self
    {
        $this->messageTheMessage = $messageTheMessage;

        return $this;
    }
}