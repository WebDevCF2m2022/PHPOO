<?php

namespace model;

// on veut utiliser Exception

use DateTime;
use Exception;

class Themessage 
{

    // propriété :
    private int $idTheMessage;
    private string $titleTheMessage;
    private string $slugTheMessage;
    private string $dateTheMessage;
    private string $messageTheMessage;
    private int $theMessageIdTheUser;


    // constructeur:
    public function __construct(array $datas)
    {   
        $this -> hydrate($datas);
    }


    // idrate : 
    private function hydrate(array $datas)
    {
        foreach($datas as $key => $value){
            $method = 'set'. ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }else{
                echo "setter $method($value) n'existe pas <br>";
            }
        }
    }


    // getter : 
    public function getIdTheMessage(): int 
    {
        return $this-> idTheMessage;
    }

    public function getTitleTheMessage(): string
    {
        return $this-> titleTheMessage;
    }

    public function getSlugTheMessage(): string
    {
        return $this-> slugTheMessage;
    }

    public function getDateTheMessage(): string
    {
        return $this-> dateTheMessage;
    }

    public function getMessageTheMessage(): string
    {
        return $this-> messageTheMessage;
    }

    public function getTheMessageIdTheUser(): int
    {
        return $this-> theMessageIdTheUser;
    }


    // setter :
    public function setIdTheMessage(int $idTheMessage)
    {
        $this->idTheMessage = $idTheMessage;
    }

    public function setTitleTheMessage(string $titleTheMessage)
    {
        $this->titleTheMessage = $titleTheMessage;
    }

    public function setSlugTheMessage(string $slugTheMessage)
    {
        $this-> slugTheMessage =$slugTheMessage;
    }

    public function setDateTheMessage(string $dateTheMessage)
    {
            $this-> dateTheMessage = $dateTheMessage;      
    }

    public function setMessageTheMessage(string $messageTheMessage)
    {
        $this-> messageTheMessage = $messageTheMessage;
    }

    public function setTheMessageIdTheUser(int $theMessageIdTheUser)
    {
        $this-> theMessageIdTheUser = $theMessageIdTheUser;
    }

}