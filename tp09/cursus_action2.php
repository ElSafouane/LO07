<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Cursus Action 2</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="my_css.css">

</head>
<body>
<div class="container">

    <div class='panel panel-success'>
        <div class='panel-heading'>
            Cursus Action 2
        </div>
    </div>
    <?php
    require_once "Cursus2.class.php";
    require_once "Module.class.php";

    if (empty($_GET["categorie"])){
        $categorie="------";
    }
    else{
        $categorie=$_GET["categorie"];
    }
    $module= new Module($_GET["sigle"],$_GET["label"], $categorie,$_GET["effectif"]);

    $cur=new Cursus2();

    $cur->addModule($module);
    $cur->affiche();


    echo "<div class='panel panel-success'>";
    echo "<div class='panel-heading'>Question 7</div><div class='panel-body'>Lorsque l'on ajoute un nouveau Module par le formulaire celui-ci est ajouté aux cursus déja inscrits précedemment.</div></div>"







    ?>





</div>
</body>
</html>