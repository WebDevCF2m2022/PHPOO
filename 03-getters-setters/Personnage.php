<?php

class Personnage{
    // attributs

    protected $type = "Humain";
    protected $nom;
    protected $genre;
    protected $pointDeVie=1000;
    protected $attaque = 100;
    protected $defense = 100;
    protected $dexterite = 100;

    // constantes
    public const NB_FACE_DE = 12;
    public const ARRAY_TYPE = [
        'Humain',
        'Elf',
        'Orc'
    ];


    // méthodes
    
        // constructeur
        public function __construct(string $type, string $name, string $genre=""){
            // utilisation des setters pour modifier les attibuts
            $this->setType($type)->setNom($name)->setGenre($genre);
        }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Personnage
     */
    public function setType(string $type): Personnage
    {
        $type = trim($type);
        if(in_array($type,self::ARRAY_TYPE)) {
            if (strlen($type) >= 3) {
                $this->type = $type;
                return $this;
            }
        }

    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Personnage
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     * @return Personnage
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * @return int
     */
    public function getPointDeVie(): int
    {
        return $this->pointDeVie;
    }

    /**
     * @param int $pointDeVie
     * @return Personnage
     */
    public function setPointDeVie(int $pointDeVie): Personnage
    {
        $this->pointDeVie = $pointDeVie;
        return $this;
    }

    /**
     * @return int
     */
    public function getAttaque(): int
    {
        return $this->attaque;
    }

    /**
     * @param int $attaque
     * @return Personnage
     */
    public function setAttaque(int $attaque): Personnage
    {
        $this->attaque = $attaque;
        return $this;
    }

    /**
     * @return int
     */
    public function getDefense(): int
    {
        return $this->defense;
    }

    /**
     * @param int $defense
     * @return Personnage
     */
    public function setDefense(int $defense): Personnage
    {
        $this->defense = $defense;
        return $this;
    }

    /**
     * @return int
     */
    public function getDexterite(): int
    {
        return $this->dexterite;
    }

    /**
     * @param int $dexterite
     * @return Personnage
     */
    public function setDexterite(int $dexterite): Personnage
    {
        $this->dexterite = $dexterite;
        return $this;
    }
        
        
}