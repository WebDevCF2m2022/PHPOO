<?php

class Personnage
{
    // Attributs - protected : comme private, impossible d'y accéder ou de le modifier depuis l'extérieur de
    // l'instance de classe, par contre, les descendants de cette classe (extends) pourront les lire et modifier


    protected $type;
    protected $nom;
    protected $genre;
    protected $pointDeVie = 1000;
    protected $attaque = 100;
    protected $defense = 100;
    protected $dexterite = 100;

    // Constantes
    public const NB_FACE_DE = 12;
    public const ARRAY_TYPE = [
        'Humains',
        'Elfes',
        'Nains',
        'Orcs',
        'Gobelins',
    ];


    // Méthodes - fonctions avec visibilité et isolation

        // Constructeur - Public, appelé lors de l'instanciation de la classe
        public function __construct(string $type, string $name, string $genre = "")
        {

        }


        // Setters - ou mutators

        // Getters - ou accessors

            // récupère le type au format string ou null (?string)
            public function getType(): ?string
            {
                return $this->type;
            }

            // récupère le nom au format string ou null (?string)
            public function getNom(): ?string
            {
                return $this->nom;
            }

            // récupère le genre au format string ou null (?string)
            public function getGenre(): ?string
            {
                return $this->genre;
            }

             // récupère les points de vie au format int
             public function getPointDeVie(): int
             {
                 return $this->pointDeVie;
             }


            // fonction publique pour nous dire si un Personnage est vivant ou mort
            public function isAlive(){
                if($this->getPointDeVie()<=0){
                    return $this->getNom(). "est mort !";
                }else{
                    return $this->getNom(). "est vivant et a encore {$this->getPointDeVie()} points de vie !";
                }
            }
}