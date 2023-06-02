<?php

namespace model\abstract;

abstract class MappingClassAbstract
{
    // les enfants vont hériter de ces propriétés et méthodes

    // constructeur
    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }

    // hydratation (remplissage des propriétés en utilisant les setters)
    protected function hydrate(array $datas)
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    // on veut obligatoirement que les enfants implémentent
    // la méthode magique __toString()
    abstract public function __toString();
}