# PHPOO

## PHP 8 OO

### 1. Les classes et les objets

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

Elle a également une constante MA_CONSTANTE initialisée à 'Valeur constante'. Elle est accessible depuis l'extérieur de la classe en utilisant le nom de la classe suivi de l'opérateur de résolution de portée :: et du nom de la constante. 

Par exemple, pour accéder à la constante MA_CONSTANTE depuis l'extérieur de la classe, on écrira 

```php
echo MaClasse::MA_CONSTANTE;
```

Elle a également deux méthodes : une méthode publique methodePublique() qui affiche une chaîne de caractères, et une méthode privée methodePrivee() qui affiche également une chaîne de caractères.

Les propriétés d'une classe peuvent être de différents niveaux d'accessibilité : **public**, **protected** ou **private**. Les méthodes peuvent également être de différents niveaux d'accessibilité. 

- **public** Les propriétés et les méthodes publiques sont accessibles depuis l'extérieur de la classe, ainsi que dans la classe elle-même et ses sous-classes.

- **protected** Les propriétés et les méthodes protégées ne sont accessibles que dans la classe elle-même et ses sous-classes.

- **private** Les propriétés et les méthodes privées ne sont accessibles que dans la classe elle-même.


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

... en cours


Exemple de surcharge du constructeur de la classe parente

```php
class Animal {
    public $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
}

class Cat extends Animal {
    public $color;
    
    public function __construct($name, $color) {
        parent::__construct($name);
        $this->color = $color;
    }
}

$cat = new Cat("Whiskers", "gray");
echo $cat->name;  // Affiche "Whiskers"
echo $cat->color; // Affiche "gray"
```
