<?php
// Lancement de session
session_start();

// constantes de connexion (et autres constantes globales)
require_once "../configuration/config.php";

// Autoload de classes (qui portent le même nom que le fichier) ! Gestion des namespaces
spl_autoload_register(function ($className) {
    // par exemple si on est dans le dossier public
    $file = '../model/' . str_replace('\\', '/', $className) . '.php';
    // si le fichier existe, on le require_once
    if (file_exists($file)) {
        require_once $file;
    }
});


