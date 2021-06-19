<!DOCTYPE html>
<?php
require_once "lo07_biblio_formulaire_bt.php";
$titre = "Module Formulaire";
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.css" rel="stylesheet"/>
    <link href="my_css.css" rel="stylesheet" type="text/css"/>
    <title><?php echo $titre; ?></title>
</head>
<body>
<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $titre; ?></h3>
        </div>
    </div>
    <?php
    $listeCat= array("CS","TM","EC","ME","CT");
    form_begin("lo07", "get", "module_action.php");
    form_input_text("Sigle", "sigle",1,"LO07");
    form_input_text("Label", "label",1,"Web");
    form_select("Catégorie", "categorie", "", 5, $listeCat);
    form_input_text("Effectif","effectif",1,"100");
    form_input_reset("Effacer");
    form_input_submit("Envoyer");
    form_end();
    ?>
</div>
</body>
</html>


