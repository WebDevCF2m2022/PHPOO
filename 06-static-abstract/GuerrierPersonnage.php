<?php

class GuerrierPersonnage extends Personnage
{

    // Attributs propres à la classe GuerrierPersonnage
    protected $rage = 50;

    // recréation du constructeur (efface le constructeur parent)
public function __construct(string $typage, string $name, string $gender = "")
    {
        // on veut garder le constructeur parent pour permettre une surcharge du constructeur
        parent::__construct($typage, $name, $gender);
        // on va modifier des points de vie à +300 : surcharge du constructeur
        $this->setPointDeVie($this->getPointDeVie()+300);
        // on va modifier des points de puissance à +20 : surcharge du constructeur
        $this->setPuissance($this->getPuissance()+20);

    }
    // Créez une méthode protégée qui va prendre les points de rage (avec le getter) et rajouter 5 lancés de dés
    // en utilisant la constante NB_FACE_DE et mettre à jour les points de rage (avec le setter)
    protected function initRage(): void
    {
        $this->setRage($this->getRage() + (5 * random_int(1, self::NB_FACE_DE)));
    }

    // redéfinition de la méthode attaquer qui vient du parent Personnage
    public function attaquer(Personnage $cible): array
    {
        $pointsAttaque = $this->getPuissance() + $this->getRage();
        $sortie['nom'] = $this->getNom();
        $sortie['attaqueDeBase'] = $pointsAttaque;
        $sortie['attaqueCourante']= parent::lanceDes($this->getDexterite());
        $sortie['attaqueTotale'] = $sortie['attaqueDeBase'] + $sortie['attaqueCourante']['total'];
        return $sortie;

    }

    // Setters et Getters
    public function getRage(): int
    {
        return $this->rage;
    }

    public function setRage(int $rage): void
    {
        $this->rage = $rage;
    }
}