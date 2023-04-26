<?php

class Personnage
{
    // attributs

    protected $type;
    protected $nom;
    protected $genre;
    protected $pointDeVie = 1000;
    protected $attaque = 100;
    protected $defense = 100;
    protected $dexterite = 100;

    // constantes
    public const NB_FACE_DE = 12;
    public const ARRAY_TYPE = [
        'Humains',
        'Elfes',
        'Nains',
        'Orcs',
        'Gobelins',
    ];


    // méthodes

    // constructeur
    public function __construct(string $type, string $name, string $genre = "")
    {

    }


}