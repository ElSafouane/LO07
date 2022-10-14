
<!-- ----- debut config -->
<?php

// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.
if (!defined('DEBUG')) {
    define('DEBUG', FALSE);
}

// Configuration de la base de données
$dsn='mysql:dbname=el_mchas;host=localhost;charset=utf8';
$username='#####';
$password='#####';
$option= array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$database= mysqli_connect("localhost", "el_mchas", "rHJ0YcSf", "el_mchas") or
die("Impossible de se connecter à MySQL"+ mysqli_connect_error());

try {
    $database = new PDO($dsn, $username, $password, $option);
} catch (PDOException $e) {
    printf("%s %s", $e->getCode(), $e->getMessage());
}

// chemin absolu vers le répertoire du projet SUR DEV-ISI 
$root = dirname(dirname(__DIR__)) . "/";


if (DEBUG) {
 echo ("<ul>");
 echo (" <li>dsn = $dsn</li>");
 echo (" <li>username = $username</li>");
 echo (" <li>password = $password</li>");
 echo ("<li>---</li>");
 echo (" <li>root = $root</li>");

 echo ("</ul>");
}
?>

<!-- ----- fin config -->



