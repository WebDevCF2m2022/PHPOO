<?php

class Personnage
{
    # Attributs - variables propres à la classe - protected = accessibles dans la classe et les classes enfants
    protected $type;
    protected $nom;
    protected $genre;
    protected $pointDeVie = 1000;
    protected $attaque = 100;
    protected $defense = 100;
    protected $dexterite = 100;

    # Constantes - constantes propres à la classe - public = accessibles partout
    public const NB_FACE_DE = 12;
    public const ARRAY_TYPE = [
        'Humains',
        'Elfes',
        'Nains',
        'Orcs',
        'Gobelins',
    ];


    # Méthodes - fonctions propres à la classe

    // Constructeur - permet d'initialiser les attributs lors de l'instanciation de la classe - utilisé pour les attributs obligatoires en passant par les setters.
    public function __construct(string $type, string $name, string $genre = "")
    {
      $this->setType($type);
      $this->setNom($name);
      $this->setGenre($genre);
    }

    // Setters - permettent de modifier les attributs
    public function setType(string $type)
    {
        if (in_array($type, self::ARRAY_TYPE)) {
            $this->type = $type;
        }
    }
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }
    public function setGenre(string $genre)
    {
        $this->genre = $genre;
    }
    public function setPointDeVie(int $pointDeVie)
    {
        $this->pointDeVie = $pointDeVie;
    }
    public function setAttaque(int $attaque)
    {
        $this->attaque = $attaque;
    }
    public function setDefense(int $defense)
    {
        $this->defense = $defense;
    }
    public function setDexterite(int $dexterite)
    {
        $this->dexterite = $dexterite;
    }

    // Getters - permettent de récupérer les attributs
    public function getType()
    {
        return $this->type;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getGenre()
    {
        return $this->genre;
    }
    public function getPointDeVie()
    {
        return $this->pointDeVie;
    }
    public function getAttaque()
    {
        return $this->attaque;
    }
    public function getDefense()
    {
        return $this->defense;
    }
    public function getDexterite()
    {
        return $this->dexterite;
    }




}