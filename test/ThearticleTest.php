<?php

// dependencies
require_once "../config.php";

// Personal autoload
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require '../' .$class . '.php';
});

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


use MyModels\Mapping\ThearticleMapping;

$a = new ThearticleMapping([
    "idthearticle" => 2,
    "thearticletitle" => "popo DF GFGD SFF SF GFSG",
    "thearticleslug" => "polopolop",
    "thearticleresume" => "bfsuif ifsqfi fnqkdf njdfnq jsdnf jqf dnqsjkdn fjkqsfn jkqsndfjklq",
    "thearticletext" => "ldozfodfsdfio dsnq ndjiq fndjkqnf jklnjkqsd njkqdsfn jkdqsnjkd fnqsjkf nqjkdfn jklqsfndjk slf ",
    "thearticledate" => "13-20-1983",
    "thearticleactivate" => 3,
    "theuser_idtheuser" => 1,

]);

var_dump($a);
echo $a;