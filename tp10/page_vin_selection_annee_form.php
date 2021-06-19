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

echo panel_head("Formulaire de sélection une année");?>


<form action="page_vin_selection_annee_action.php">
    <select class="form-control form-group" size="5" name="annee" id="anee">
        <?php
        $query = "select distinct annee from vin order by annee";
        $statement=$database->query($query);
        while ($tuple = $statement->fetch()) {
            echo"<option>".$tuple["annee"]."</option>";
        }
        ?>
    </select>

    <input type="submit" value="Submit Form" class="btn btn-success"></button>

</form>

<?php
include "fragmentFooter.html";
?>