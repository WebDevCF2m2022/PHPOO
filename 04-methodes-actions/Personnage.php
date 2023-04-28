<?php

/**
 * Class Personnage
 *
 * Cette classe représente un personnage de jeu vidéo:
 *
 * Un personnage est caractérisé par :
 *
 * - un type (humains, elfes, nains, orcs, gobelins)
 * - un nom (entre 3 et 18 caractères)
 * - un genre (masculin, féminin, non genré, autre)
 * - des points de vie (1000 par défaut)
 * - une attaque (100 par défaut)
 * - une défense (100 par défaut)
 * - une dextérité (100 par défaut)
 * - un tableau de dés (12 par défaut)
 *
 * Les attributs sont en protected, ce qui signifie qu'ils ne sont pas accessibles depuis l'extérieur de la classe,
 * sauf pour les classes qui héritent de cette classe.
 */
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
    public const ARRAY_GENRE= [
        'Masculin',
        'Féminin',
        'Non genré',
        'Autre',
    ];


    // Méthodes - fonctions avec visibilité et isolation

        // Constructeur - Public, appelé lors de l'instanciation de la classe
        public function __construct(string $typage, string $name, string $gender)
        {
            // utilisation des setters pour vérifier les données et les affecter aux attributs
            $this->setType($typage);
            $this->setNom($name);
            $this->setGenre($gender);
        }


        // Setters - ou mutators

            // le type doit se trouver dans la liste de type ARRAY_TYPE, self:: représente la classe
            public function setType(string $t): void
            {
                // Si le type est dans la liste, on l'accepte.
                if(in_array($t,self::ARRAY_TYPE)){
                    $this->type = $t;
                }
            }

            // le nom doit être un string de minimum 3 caractères et maximum 18
            public function setNom(string $nom): void
            {
                // pour ne pas répéter l'exécution du strlen, création d'une variable (bonne pratique, surtout dans
                // des boucles), $nb contient la longueur de la chaîne $nom
                $nb = strlen($nom);
                if($nb >=3 && $nb <=18){
                    $this->nom = $nom;
                }
            }

            // le genre est optionnel
            public function setGenre(?string $g): void
            {
                $this->genre = $g;
            }


            public function setPointDeVie(int $pointDeVie): void
            {
                $this->pointDeVie = $pointDeVie;
            }

            public function setAttaque(int $attaque): void
            {
                $this->attaque = $attaque;
            }

            public function setDefense(int $defense): void
            {
                $this->defense = $defense;
            }

            public function setDexterite(int $dexterite): void
            {
                $this->dexterite = $dexterite;
            }




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


            public function getAttaque(): int
            {
                return $this->attaque;
            }


            public function getDefense(): int
            {
                return $this->defense;
            }


            public function getDexterite(): int
            {
                return $this->dexterite;
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