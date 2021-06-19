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

echo panel_head("Ajout d'un vin (action)");
try {

    $query="select max(id) from vin";
    $statement=$database->query($query);
    $tuple=$statement->fetch();
    $id=$tuple['0'];
    $id++;

    $cru=$_GET["cru"];
    $annee=$_GET["annee"];
    $degre=$_GET["degre"];

    $ajout = "insert into vin (id, cru, annee, degre) values('$id','$cru','$annee','$degre')";
    $database->exec($ajout);
}
catch (PDOException $e) {
    printf("%s %s", $e->getCode(), $e->getMessage());
}
include "fragmentFooter.html";

?>
