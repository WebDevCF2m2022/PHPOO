<?php
// démarre la session
session_start();

// charge le fichier de configuration
require_once '../configuration/config.php';

// autoload de nos classes depuis la racine PATH_ROOT en suivant l'arborescence
// des namespaces de nos classes
spl_autoload_register(
    function ($className) {
        $className = str_replace('\\', '/', $className);
        require_once PATH_ROOT. '/' . $className . '.php';
    });

// connexion à la base de données en PDO
try {
    $pdo = new PDO(
        DB_DRIVER . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET . ';port=' . DB_PORT,
        DB_USER,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}

// si on est connecté on va sur le contrôleur de l'administration
if (isset($_SESSION['idsession'])&& $_SESSION['idsession'] == session_id()) {
    // on charge le contrôleur de l'administration
    require_once '../controller/adminController.php';

} else {
    // sinon on va sur le contrôleur public
    require_once '../controller/publicController.php';
}
