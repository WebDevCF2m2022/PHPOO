<?php
// chargement de la classe Personnage (parent) et MagePersonnage (enfant)
class MagePersonnage extends Personnage
{

    // Attributs propres à la classe MagePersonnage
    protected $mana = 100;

    // recréation du constructeur (efface le constructeur parent)
    public function __construct(string $typage, string $name, string $gender = "")
    {
        // on veut garder le constructeur parent pour permettre une surcharge du constructeur
        parent::__construct($typage, $name, $gender);
        // on va modifier des points de vie à -300 : surcharge du constructeur
        $this->setPointDeVie($this->getPointDeVie()-300);
        // on va modifier des points de puissance à -10 : surcharge du constructeur
        $this->setPuissance($this->getPuissance()-10);
        // pas possible d'afficher ou modifier une propriété privée dans un enfant
        //echo $this->createTime;
        // $this->createTime= microtime();
        // on initialise la mana avec initMana
        $this->initMana();
    }

    // Créez une méthode protégée qui va prendre les points de mana (avec le getter) et rajouter 5 lancés de dés
    // en utilisant la constante NB_FACE_DE et mettre à jour les points de mana (avec le setter)
    protected function initMana(): void
    {
        $this->setMana($this->getMana() + (5 * random_int(1, self::NB_FACE_DE)));
    }

    // redéfinition de la méthode attaquer qui vient du parent Personnage
    public function attaquer(Personnage $cible): array
    {
        $pointsAttaque = $this->getPuissance() + $this->getMana();
        $sortie['nom'] = $this->getNom();
        $sortie['attaqueDeBase'] = $pointsAttaque;
        $sortie['attaqueCourante']= parent::lanceDes($this->getDexterite());
        $sortie['attaqueTotale'] = $sortie['attaqueDeBase'] + $sortie['attaqueCourante']['total'];
        return $sortie;

    }

    // Getters et Setters
    public function getMana(): int
    {
        return $this->mana;
    }

    public function setMana(int $mana): void
    {
        $this->mana = $mana;
    }



}