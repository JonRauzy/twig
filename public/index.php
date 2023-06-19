<?php

session_start();


// dependencies
require_once "../config.php";


// Personal autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' .$class . '.php';
});


// auto load de twig : 
require_once "../vendor/autoload.php";


// $loader = new \Twig\Loader\FilesystemLoader('../view');
// $twig = new \Twig\Environment($loader, [
//     'cache' => '../view/chache',
// ]);

    
// db connection
try {
        $pdo = new PDO(
            DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET . ';port=' . DB_PORT,
            DB_LOGIN,
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


// ROUTER : 
require_once "../controller/publicController.php";


// close connection (portabilité hors MySQL, mettre en commentaire en cas de connexion permanente)
$pdo = null;