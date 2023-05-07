<?php

/**
 * abstract class Personnage
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
 *
 * Les constantes sont en public, ce qui signifie qu'elles sont accessibles depuis l'extérieur de la classe. Non
 * modifiables (ce sont des constantes !)
 *
 * Le constructeur de la classe permet d'instancier un objet Personnage en lui passant en paramètre 3 valeurs :
 * - le nom
 * - le genre
 * - le type
 *
 * Le constructeur initialise les autres attributs avec des méthodes protégées.
 *
 * Les setters permettent de modifier les attributs de l'objet Personnage en vérifiant les données passées en paramètre.
 *
 * Les getters permettent de récupérer les attributs de l'objet Personnage.
 *
 * Cette classe est abstraite, ce qui signifie qu'on ne peut pas l'instancier directement. Il faut passer par une
 * classe qui hérite de cette classe (extends)
 */
abstract class Personnage
{
    // Attributs - protected : comme private, impossible d'y accéder ou de le modifier depuis l'extérieur de
    // l'instance de classe, par contre, les descendants de cette classe (extends) pourront les lire et modifier

    private $createTime = null;
    protected $type;
    protected $nom;
    protected $genre;
    protected $pointDeVie = 1000;
    protected $puissance = 100;
    protected $defense = 100;
    protected $dexterite = 35;
    protected $experience = 0;

    // Constantes
    public const NB_FACE_DE = 12; // dé de type Dodécaèdre
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
            // appel la méthode protégée qui initialise les points de vie (1000 par défaut auquel on ajoute 20 jets de dé)
            $this->initPointDeVie();
            // appel la méthode protégée qui initialise la Puissance (100 par défaut auquel on ajoute/diminue avec 1 chance sur
            // 2 de 2 jets de dé)
            $this->initPuissance();
            // appel la méthode protégée qui initialise la défense (100 par défaut auquel on ajoute/diminue avec 1 chance sur 2 de 1 jet de dé)
            $this->initDefense();
            // appel la méthode protégée qui initialise la dextérité (100 par défaut auquel on ajoute/diminue avec 3 chances sur 4 de 1 jet de dé)
            $this->initDexterite();
            // on initialise le temps de création de l'objet privé, l'enfant ne pourra pas le modifier autrement que
            // via le constructeur parent
            $this->createTime= time();
        }

        // fonction publique qui lance les dés qui n'a pas besoin d'être instanciée pour fonctionner !
       public static function lanceDes(int $des=1):array{
            // sortie numérique pour le return
            $nb = 0;
            // sortie en tableau pour le tracing des actions
            $sortie = [];
            // tant que l'on a des dés
            for($i=0;$i<$des;$i++){
                // on lance un dé
                $lance = mt_rand(1,self::NB_FACE_DE);
                // on ajoute à la valeur de sortie finale
                $nb += $lance;
                // on arrête le tracing si on a fait 10 lancés
                //if($i>9){
                    // on continue pour ne pas faire le reste du code
                //    continue;
                //}
                // tracing (non obligatoire) pour garder les lancés de dés
                $sortie[$i]="Lancé : $lance/".self::NB_FACE_DE;
            }
            $sortie['total'] = $nb;
            return $sortie;
        }

        // Créez une méthode protégée qui va prendre les points de vie (avec le getter) et rajouter 20 lancés de dés
        // en utilisant la constante NB_FACE_DE et mettre à jour les points de vie (avec le setter)
        protected function initPointDeVie(){
            // On prend les points de vie avec le getter
            $pdv = $this->getPointDeVie();
            // On y ajoute 20 lancés de dés
            $pdv += $this->lanceDes(20)['total'];
            // On modifie les points de vie avec le setter
            $this->setPointDeVie($pdv);

        }

        // Créez une méthode protégée qui va prendre l'attaque (avec le getter) et rajouter OU diminuer (1 chance sur 2) 2
        // lancés de dés en utilisant la constant NB_FACE_DE et mettre à jour l'attaque (avec le setter)
        protected function initPuissance(){
            // On prend l'attaque avec le getter
            $att = $this->getPuissance();
            // On lance un hasard à 2 possibilités pour savoir si on ajoute ou on enlève les 2 lancés de dés
            $lance = mt_rand(1,2);
            // Si on a 1, on enlève
            if($lance == 1){
                $att -= $this->lanceDes(2)['total'];
            }else{
                // Sinon on ajoute
                $att += $this->lanceDes(2)['total'];
            }
            // On modifie l'attaque avec le setter
            $this->setPuissance($att);
        }

        // Créez une méthode protégée qui va prendre la défense (avec le getter) et rajouter OU diminuer (1 chance sur 2) 1
        // lancé de dés en utilisant la constant NB_FACE_DE et mettre à jour la défense (avec le setter)
        protected function initDefense(){
            // On prend la défense avec le getter
            $def = $this->getDefense();
            // On lance un hasard à 2 possibilités pour savoir si on ajoute ou on enlève 1 dé
            $lance = mt_rand(1,2);
            // Si on a 1, on enlève
            if($lance == 1){
                $def -= $this->lanceDes(1)['total'];
            }else{
                // Sinon on ajoute
                $def += $this->lanceDes(1)['total'];
            }
            // On modifie la défense avec le setter
            $this->setDefense($def);
        }

        // Créez une méthode protégée qui va prendre la dextérité (avec le getter) et rajouter OU diminuer (3 chances sur 4 pour rajouter) 1 lancé de dés en utilisant la constante NB_FACE_DE et mettre à jour la dextérité (avec le setter)
        protected function initDexterite(){
            // On prend la dextérité avec le getter
            $dex = $this->getDexterite();
            // On lance un hasard à 4 possibilités pour savoir si on ajoute ou on enlève 1 dé
            $lance = mt_rand(1,4);
            // Si on a 1, on enlève
            if($lance == 1){
                $dex -= $this->lanceDes(1)['total'];
            }else{
                // Sinon on ajoute
                $dex += $this->lanceDes(1)['total'];
            }
            // On modifie la dextérité avec le setter
            $this->setDexterite($dex);
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

            // le genre doit se trouver dans la liste de genre ARRAY_GENRE
            public function setGenre(?string $g): void
            {
                if(in_array($g,self::ARRAY_GENRE)){
                    $this->genre = $g;
                }

            }


            public function setPointDeVie(int $pointDeVie): void
            {
                $this->pointDeVie = $pointDeVie;
            }

            public function setPuissance(int $puissance): void
            {
                $this->puissance = $puissance;
            }

            public function setDefense(int $defense): void
            {
                $this->defense = $defense;
            }

            public function setDexterite(int $dexterite): void
            {
                $this->dexterite = $dexterite;
            }

            public function setExperience(int $experience): void
            {
                $this->experience = $experience;
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


            public function getPuissance(): int
            {
                return $this->puissance;
            }


            public function getDefense(): int
            {
                return $this->defense;
            }


            public function getDexterite(): int
            {
                return $this->dexterite;
            }

            public function getExperience(): int
            {
                return $this->experience;
            }

            // création d'une méthode abstract pour forcer les classes filles à l'utiliser
            // Elle prend en paramètre un objet de type Personnage
            // Attention, une méthode abstract ne peut pas avoir de corps et ne peut
            // se trouver que dans une classe abstract
            abstract function attaquer(Personnage $cible): ?array;
}