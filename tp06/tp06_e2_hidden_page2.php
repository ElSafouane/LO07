<!DOCTYPE html>
<?php

require "lo07_biblio_formulaire_bt.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>TP06</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap.css" rel="stylesheet"/>
    <link href="my_css.css" rel="stylesheet" type="text/css"/>
</head>
<body>

<div class="container">

    <div class="panel panel-success">
        <div class="panel-heading">
            TP06 Hidden Page2
        </div>
    </div>

    <?php
    $tab="";
    foreach ($_GET as $cle=>$valeur){
        $tab=$tab."$cle=$valeur"."&";
    }
    echo '<a href="lo07_analyse_superglobales.php?'.$tab.'">lo07_analyse_superglobales.php?'.$tab.'</a>';

    ?>



</div>
</body>
</html>