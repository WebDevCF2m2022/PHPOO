<?php 
// Première classe, bonne pratique, même nom que le fichier

class MaPremiereClass{
    // Attributs -> variables avec visibilités
    public $premierAttribut;
    public $deuxiemeAttribut;
    // Constantes -> constantes (avec lecture seule, etc...) par défaut publique
    public const PREMIERE_CONSTANTE = "Une valeur obligatoire, lisible mais non modifiable";
    public const DEUXIEME_CONSTANTE = 5;

    // Méthodes -> fonctions avec visibilités
    public  function helloWorld(){
        return "Hello World !";
    }
}