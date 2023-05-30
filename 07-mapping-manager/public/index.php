<?php
// Lancement de session
session_start();

// constantes de connexion (et autres constantes globales)
require_once "../configuration/config.php";

// Autoload de classes (qui portent le même nom que le fichier) ! Gestion des namespaces
spl_autoload_register(function ($className) {
    // par exemple si on est dans le dossier public, le str_replace va remplacer les \ des namespaces par des / et on
    // aura par exemple ../model/Entity.php
    $file = '../' . str_replace('\\', '/', $className) . '.php';
    // si le fichier existe, on le charge
    if (file_exists($file)) {
        require_once $file;
    }
});

// connexion à la base de données
try {
    $pdo = new PDO(
        DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET . ';port=' . DB_PORT,
        DB_USER,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (Exception $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit;
}

require_once "../controller/publicController.php";



// fermeture de la connexion
$pdo = null;

