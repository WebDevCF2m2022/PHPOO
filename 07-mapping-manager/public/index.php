<?php
// Lancement de session
session_start();

// constantes de connexion (et autres constantes globales)
require_once "../configuration/config.php";

// Autoload de classes (qui portent le même nom que le fichier) ! Gestion des namespaces
spl_autoload_register(function ($className) {
    // par exemple si on est dans le dossier public, le str_replace va remplacer les \ des namespaces par des / et on aura par exemple ../model/Entity/Entity.php
    $file = '../model/' . str_replace('\\', '/', $className) . '.php';
    // si le fichier existe, on le charge
    if (file_exists($file)) {
        require_once $file;
    }
});


