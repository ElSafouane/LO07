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

$query="select * from vin order by cru";
echo panel_head("Liste des vins ".$query);
$statement=$database->query($query);
include "fragmentVinResultats.php";
?>