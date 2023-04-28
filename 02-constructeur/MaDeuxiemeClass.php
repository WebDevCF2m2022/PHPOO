<?php 
// Première classe, bonne pratique, même nom que le fichier

class MaDeuxiemeClass{
    // Attributs -> variables avec visibilités privées
    /*
        public => peut être lue et modifiée en dehors de l'instance de classe (EN PHP 8.3 on pourra utiliser readonly => lecture mais pas d'écriture)
        private => ne peut pas être lue et modifiée en dehors de l'instance de classe ni dans ses descendants
        protected => ne peut pas être lue et modifiée en dehors de l'instance de classe mais peut être modifiées à l'intérieur de ses descendants
     */

    private $premierAttribut=1;
    private $deuxiemeAttribut;
    // Constantes -> constantes (avec lecture seule, etc...) par défaut publique
    public const PREMIERE_CONSTANTE = "Une valeur obligatoire, lisible mais non modifiable";
    private const DEUXIEME_CONSTANTE = 5;

    // Méthodes -> fonctions avec visibilités

    // constructeur appelé quand il y a le mot clef new, toujours publique
    public function __construct($first,$second){
        // mauvaise pratique mais utile et souvant utilisée 
        // on modifie les attributs privés ou protected avec les valeurs de l'instanciation
        // $this = instance ou object
        $this->premierAttribut = $first;
        $this->deuxiemeAttribut = $second;


    }

    public  function helloWorld():string{
        return "Hello World !";
    }
}