# PHPOO

## PHP 8 Orienté Objet

### 1. Les classes et les objets

**Définition** : Une **classe** est une structure qui permet de définir des objets. Une classe est un modèle+ qui décrit les caractéristiques communes d'un groupe d'objets.

Un **objet** est une **instance d'une classe**. Un objet est une entité qui possède des propriétés, des constantes et des méthodes.

#### 1.1. Déclaration d'une classe

La déclaration d'une classe en PHP commence par le mot clé class, suivi du nom de la classe et de son contenu entre accolades. Voici un exemple de déclaration de classe en PHP

```php
class MaClasse {
    // Propriétés
    private $proprietePrivee;
    public $proprietePublique = 'Valeur par défaut';
    
    // Constantes
    const MA_CONSTANTE = 'Valeur constante';

    // Méthodes
    public function methodePublique() {
        echo "Ceci est une méthode publique";
    }
    
    private function methodePrivee() {
        echo "Ceci est une méthode privée";
    }
}
```

Dans cet exemple, la classe s'appelle MaClasse. Elle a deux propriétés : une propriété privée $proprietePrivee et une propriété publique $proprietePublique initialisée à 'Valeur par défaut'. 

Elle a également une constante MA_CONSTANTE initialisée à 'Valeur constante'. Elle est accessible depuis l'extérieur de la classe en utilisant le nom de la classe suivi de l'opérateur de résolution de portée `::` et du nom de la constante. 

Par exemple, pour accéder à la constante MA_CONSTANTE depuis l'extérieur de la classe, on écrira 

```php
echo MaClasse::MA_CONSTANTE;
```

#### 1.1.2 La visibilité des propriétés et des méthodes

Elle a également deux méthodes : une méthode publique methodePublique() qui affiche une chaîne de caractères, et une méthode privée methodePrivee() qui affiche également une chaîne de caractères.

Les propriétés d'une classe peuvent être de différents niveaux d'accessibilité : **public**, **protected** ou **private**. Les méthodes peuvent également être de différents niveaux d'accessibilité. 

- **public** Les propriétés et les méthodes publiques sont accessibles depuis l'extérieur de la classe, ainsi que dans la classe elle-même et ses sous-classes.

- **protected** Les propriétés et les méthodes protégées ne sont accessibles que dans la classe elle-même et ses sous-classes.

- **private** Les propriétés et les méthodes privées ne sont accessibles que dans la classe elle-même.

Nous verrons plus loin l'utilité de ces différents niveaux d'accessibilité.

#### 1.2. Instanciation d'une classe

Il est important de noter que la déclaration d'une classe en PHP ne crée pas directement un objet. Une classe est simplement une structure qui décrit les propriétés et les méthodes d'un objet. Pour **créer un objet** à partir d'une classe, vous devez **instancier** la classe en utilisant le mot clé **new**, comme ceci :

```php
$objet = new MaClasse();
```

Dans cet exemple, nous avons instancié la classe MaClasse et stocké l'objet dans la variable $objet.

#### 1.3. Accès aux propriétés et aux méthodes d'un objet

Une fois que vous avez instancié une classe, vous pouvez accéder à ses propriétés et à ses méthodes publiques en utilisant l'opérateur de flèche ->, comme ceci :

```php
echo $objet->proprietePublique;
echo $objet->methodePublique();
```

#### 1.4. Accès aux propriétés et aux méthodes d'une classe depuis l'intérieur de la classe

Lorsque vous êtes à l'intérieur d'une classe, vous pouvez accéder à ses propriétés et à ses méthodes en utilisant **self** et l'opérateur de résolution de portée **::**, ou le **$this** si la classe est instanciée :

```php
class MaClasse {
    // Propriétés
    private $proprietePrivee;
    public $proprietePublique = 'Valeur par défaut';
    
    // Constantes
    const MA_CONSTANTE = 'Valeur constante';

    // Méthodes
    public function methodePublique() {
        echo "Ceci est une méthode publique";
    }
    
    private function methodePrivee() {
        echo "Ceci est une méthode privée";
    }
    
    public function methodePublique2() {
        $this->proprietePrivee=5;
        $this->proprietePublique="Nouvelle valeur";
        $sortie = $this->methodePublique();
        $sortie.=" ".self::MA_CONSTANTE;
        return $sortie;
    }
}
```

#### 1.5. Accès aux propriétés et aux méthodes d'une classe depuis l'extérieur de la classe

Lorsque vous êtes à l'extérieur d'une classe, vous pouvez accéder à ses propriétés et à ses méthodes publiques en utilisant l'opérateur de flèche ->, comme ceci :

```php
echo $objet->proprietePublique;
echo $objet->methodePublique();
```

**Attention**, une propriété publique peut être modifiée depuis l'extérieur de la classe, ce qui n'est pas le cas d'une propriété privée ou protégée.

```php
$objet->proprietePublique = 'Nouvelle valeur';
```

#### 1.6 Les constructeurs

Le constructeur est une méthode spéciale (méthode magique) qui est appelée automatiquement lorsqu'un objet est instancié. Le constructeur est généralement utilisé pour initialiser les propriétés d'un objet.

Le constructeur d'une classe est défini en créant une méthode avec le nom __construct() :

```php
class MaClasse {
    public function __construct() {
        // Code du constructeur
    }
}
```

C'est au constructeur que l'on passe les paramètres lors de l'instanciation de la classe :

```php
$objet = new MaClasse($param1, $param2);
```

Voici un exemple de constructeur :

```php
class MaClasse {
    // Propriétés
    private $proprietePrivee;
    public $proprietePublique = 'Valeur par défaut';
    
    ###

    // Méthodes
    public function __construct($param1, $param2) {
        $this->proprietePrivee=$param1;
        $this->proprietePublique=$param2;
    }
    
    ###
    
    }
}
```

Nous utiliserons plus souvent les getters et les setters pour accéder aux propriétés d'une classe.

#### 1.7 Les autres méthodes magiques

PHP propose d'autres méthodes magiques qui permettent de gérer les objets. Vous pouvez les retrouver ici :

https://www.php.net/manual/fr/language.oop5.magic.php

Nous les verrons au fur et à mesure de nos besoins.

#### 1.8. Les getters et les setters

Les getters et les setters sont utilisés pour accéder aux propriétés d'une classe.

Un **getter** est une méthode qui permet d'accéder à une propriété privée ou protégée.

Un **setter** est une méthode qui permet de modifier une propriété privée ou protégée.

Les bonnes pratiques de programmation orientée objet recommandent de rendre les propriétés privées (ou protégées) et d'utiliser des getters et des setters pour accéder à ces propriétés.

Voici un exemple de getters et de setters :

```php
class MaClasse {
    // Propriétés
    private $proprietePrivee;
    protected $proprieteProtegee;
    public $proprietePublique = 'Valeur par défaut';
    
    ###

    // Méthodes
    public function __construct($param1, $param2, $param3) {
        // utilisation des setters pour modifier les valeurs des propriétés,
        // ce qui permet de vérifier les valeurs
        $this->setProprietePrivee($param1);
        $this->setProprieteProtegee($param2);
        // inutile d'utiliser un setter pour modifier la propriété publique
        $this->proprietePublique=$param3;
    }
    
    // Getters qui récupèrent des valeurs
    
    // Récupère la valeur de la propriété privée de type string ou null
    public function getProprietePrivee():?string {
        return $this->proprietePrivee;
    }
    
    // Récupère la valeur de la propriété protégée de type string ou null
    public function getProprieteProtegee():?string {
        return $this->proprieteProtegee;
    }
    
    // Setters qui modifient des valeurs
    
    // Modifie la valeur de la propriété privée uniquement si elle est de type string
    public function setProprietePrivee(string $valeur) {
        $this->proprietePrivee=$valeur;
    }
    
    // Modifie la valeur de la propriété protégée uniquement si elle est de type string 
    public function setProprieteProtegee(string $valeur) {
        $this->proprieteProtegee=$valeur;
    }
    
    ###
}
```

#### 1.8.2 Utilisation des getters pour récupérer des valeurs en dehors de la classe

```php
// Création d'un objet de la classe MaClasse
$monObjet = new MaClasse('valeur1', 'valeur2', 'valeur3');
// affichage de la valeur de la propriété publique
echo $monObjet->proprietePublique;
// affichage des valeurs de la propriété privée et de la propriété protégée
echo $monObjet->getProprietePrivee();
echo $monObjet->getProprieteProtegee();
```
#### 1.8.3 Utilisation des setters pour modifier des valeurs en dehors de la classe

```php
// Création d'un objet de la classe MaClasse
$monObjet = new MaClasse('valeur1', 'valeur2', 'valeur3');
// modification de la valeur de la propriété publique
$monObjet->proprietePublique = 'Nouvelle valeur';
// modification des valeurs de la propriété privée et de la propriété protégée
$monObjet->setProprietePrivee('Nouvelle valeur');
$monObjet->setProprieteProtegee('Nouvelle valeur');
```

#### 1.9. L'héritage

L'héritage est un concept de programmation orientée objet qui permet à une classe d'hériter des propriétés et des méthodes d'une autre classe.

Une classe qui hérite d'une autre classe est appelée **classe enfant** ou **classe dérivée**. La classe dont la classe enfant hérite est appelée **classe parente** ou **classe de base**.

Pour hériter d'une classe, utilisez le mot clé **extends** :

```php
class MaClasseEnfant extends MaClasse {
    // Code de la classe enfant
}
```

#### 1.9.2. L'héritage multiple

PHP ne supporte pas l'héritage multiple, c'est-à-dire qu'une classe ne peut hériter que d'une seule classe parente. Cependant, il est possible d'implémenter plusieurs interfaces (nous le verrons plus loin).

#### 1.9.3. L'héritage et la visibilité

Lorsque vous héritez d'une classe, vous héritez de toutes ses propriétés et de toutes ses méthodes, mais pas de sa visibilité. Les propriétés et les méthodes privées ne peuvent pas être héritées, mais les propriétés et les méthodes protégées ou publiques peuvent l'être.

#### 1.9.4. L'héritage et les visibilités des méthodes et des propriétés

Lorsque vous héritez d'une classe, vous pouvez modifier la visibilité des méthodes et des propriétés héritées. Cependant, vous ne pouvez pas rendre une propriété privée ou une méthode protégée publique.

##### 1) Les méthodes et les propriétés privées

Les méthodes et les propriétés privées ne peuvent pas être héritées, donc elles ne peuvent pas être modifiées depuis la classe enfant.

```php
class MaClasseEnfant extends MaClasse {
    // Code de la classe enfant
    // Impossible de modifier les méthodes et les propriétés privées,
    // ceci génère une erreur,
    // ou une nouvelle propriété publique est créée (faille de sécurité que l'on arrivera à corriger)
    $this->proprietePrivee = 'Nouvelle valeur';
}
```

##### 2) Les méthodes et les propriétés protégées

Les méthodes et les propriétés protégées peuvent être héritées et modifiées depuis la classe enfant.
    
```php
class MaClasseEnfant extends MaClasse {
    // Code de la classe enfant
    // Les méthodes et les propriétés protégées peuvent être modifiées
    $this->proprieteProtegee = 'Nouvelle valeur';
}
```


##### 3) Les méthodes et les propriétés publiques

Les méthodes et les propriétés publiques peuvent être héritées et modifiées depuis la classe enfant.

```php
class MaClasseEnfant extends MaClasse {
    // Code de la classe enfant
    // Les méthodes et les propriétés publiques peuvent être modifiées
    $this->proprietePublique = 'Nouvelle valeur';
}
```

#### 1.10. La surcharge

La surcharge est un concept de programmation orientée objet qui permet à une classe enfant de redéfinir une méthode d'une classe parente. La surcharge est utilisée pour remplacer une méthode héritée par une nouvelle méthode.

La méthode redéfinie doit avoir le même nom, le même nombre de paramètres et la même visibilité. La surcharge peut également être utilisée pour ajouter des paramètres à une méthode héritée.

```php
class MaClasseEnfant extends MaClasseParent {
    // Code de la classe enfant qui surcharge la méthode de la classe parente
    public function methodePublique($param1, $param2) {
        // Code de la méthode redéfinie
    }
}
```

Pour récupérer la méthode de la classe parente, utilisez le mot clé **parent** :

```php
class MaClasseEnfant extends MaClasseParent {
    // Code de la classe enfant qui surcharge la méthode de la classe parente
    public function methodePublique($param1, $param2) {
        // Code de la méthode redéfinie
        parent::methodePublique($param1, $param2);
    }
}
```





#### 1.11. Les classes abstraites

Une classe abstraite est une classe qui ne peut pas être instanciée. Elle est utilisée pour définir des méthodes et des propriétés qui seront héritées par des classes enfants.

Pour définir une classe abstraite, utilisez le mot clé **abstract** :

```php
abstract class MaClasseAbstraite {
    // Code de la classe abstraite
}
```

Une classe abstraite peut contenir des méthodes abstraites et des méthodes non abstraites.

Une méthode abstraite est une méthode qui n'a pas de corps. Elle est définie avec le mot clé **abstract** et ne peut pas être définie avec les mots clés **private**, **protected** ou **final**.

```php
abstract class MaClasseAbstraite {
    // Méthode abstraite
    abstract public function methodeAbstraite();
    
    // Méthode non abstraite
    public function methodeNonAbstraite() {
        // Code de la méthode non abstraite
    }
}
```

Une classe abstraite peut être héritée par une classe enfant. La classe enfant doit définir toutes les méthodes abstraites de la classe parente.

```php
class MaClasseEnfant extends MaClasseAbstraite {
    // Code de la classe enfant
    public function methodeAbstraite() {
        // Code de la méthode abstraite
    }
}
```

#### 1.12. Les méthodes et les propriétés statiques

Une méthode ou une propriété statique est une méthode ou une propriété qui peut être utilisée sans avoir besoin d'instancier la classe.

Pour définir une méthode ou une propriété statique, utilisez le mot clé **static** :

```php
class MaClasse {
    // Propriété statique
    public static $proprieteStatique = 'Valeur par défaut';
    
    // Méthode statique
    public static function methodeStatique() {
        // Code de la méthode statique
    }
}
```

Pour accéder à une méthode ou une propriété statique, utilisez le nom de la classe suivi de l'opérateur **::** :

```php
// Accès à une propriété statique
echo MaClasse::$proprieteStatique;

// Accès à une méthode statique
echo MaClasse::methodeStatique();
```
