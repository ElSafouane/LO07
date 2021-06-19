<?php
include "fragmenHeader.html";
require_once "fragmentDatabaseConfig.php";
require_once "bibliotheque.php";
echo "<div class='container'>";
try {
    $database = new PDO($dsn, $username, $password, $option);
} catch (PDOException $e) {
    printf("%s %s", $e->getCode(), $e->getMessage());
}

include "fragmentMenu.html";
include "fragmentJumbotron.html";
panel_head("Ajout d'un vin [form]");
$query = "select * from vin where annee =".$_GET['annee'];
$statement=$database->query($query);
include "fragmentVinResultats.php";
include "fragmentFooter.html";

?>