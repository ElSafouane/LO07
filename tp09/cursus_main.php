<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.css" rel="stylesheet"/>
    <link href="my_css.css" rel="stylesheet" type="text/css"/>
    <title>Cursus Main</title>
</head>
<body>
<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title">Cursus Main</h3>
        </div>
    </div>
<?php
require_once "Cursus.class.php";
require_once "Module.class.php";

$lo07=new Module("LO07", "Technologies du Web", "TM", "140");
$if26=new Module("IF26", "Applications Mobiles Android", "TM", "77");

echo "<h2>Définition des modules</h2>";
echo $lo07;
echo $if26;



$cursus=new Cursus();

echo "<h2>Définition d'un cursus</h2>";
$cursus->addModule($lo07);
$cursus->addModule($if26);
$cursus->affiche();
