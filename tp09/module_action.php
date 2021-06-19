<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>TP05</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="my_css.css">

</head>
<body>
<div class="container">
    <?php
    require_once "Module.class.php";
    require_once "Charte.class.php";


    $module= new Module("sigle","label","categorie","effectif");

    $module->setSigle($_GET["sigle"]);
    $module->setLabel($_GET["label"]);
    if ($module->valide()){
        $module->setCategorie($_GET["categorie"]);
    }
    $module->setEffectif($_GET["effectif"]);


    if ($module->valide()){
        $module->pageOK();
        echo ($module->sauveTXT()."<br>");
        echo ($module->createTable("module")."<br>");
        echo ($module->sauveBDR("module").'<br>');

    }
    else{
        $module->pageKO();
    }
    ?>
</div>
</body>
</html>