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

    <div class='panel panel-success'>
        <div class='panel-heading'>
            Cursus Action 1
        </div>
    </div>
    <?php
    require_once "Cursus.class.php";
    require_once "Module.class.php";

    if (empty($_GET["categorie"])){
        $categorie="------";
    }
    else{
        $categorie=$_GET["categorie"];
    }
    $module= new Module($_GET["sigle"],$_GET["label"], $categorie,$_GET["effectif"]);

    echo "<h2>Définition des modules</h2>";
    echo $module;

    $cur=new Cursus();

    echo "<h2>Définition d'un cursus</h2>";
    $cur->addModule($module);
    $cur->affiche();


    echo "<div class='panel panel-success'>";
    echo "<div class='panel-heading'>Question 4</div><div class='panel-body'>Le scipt cursus_action1 affiche le cursus dans lequel nous avons ajouté un module, lorsque le formualire est rempli de nouveau le dernier module rentré remplace le précedent.</div></div>";







    ?>





</div>
</body>
</html>