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

echo panel_head("Ajout d'un vin (form)");?>
<form action="page_vin_ajoute_action.php">
<div class="form-group">
    <label for="cru">Cru ?</label>
    <input type="text" name="cru" class="form-control">
</div>

<div class="form-group">
    <label for="annee">Année ?</label>
    <input type="text" name="annee" class="form-control">
</div>

<div class="form-group">
    <label for="degre">Degré ?</label>
    <input type="text" name="degre" class="form-control">
</div>

<input type="submit" value="Submit Form" class="btn btn-success">
</form>


<?php
include "fragmentFooter.html";
?>
