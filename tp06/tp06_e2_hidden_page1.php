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
    <?php
        form_begin("lo07","get","tp06_e2_hidden_page2.php");
        echo '<input class="btn btn-primary" name="ville" type="hidden" value="Troyes">';
        echo '<input class="btn btn-default" name="effectif" type="hidden" value="3000">';
        form_input_submit("UTT");
        form_end();
        form_begin("lo07","get","tp06_e2_hidden_page2.php");
        echo '<input class="btn btn-primary" name="ville" type="hidden" value="Compiègne">';
        echo '<input class="btn btn-default" name="effectif" type="hidden" value="3200">';
        form_input_submit("UTC");
        form_end();
        form_begin("lo07","get","tp06_e2_hidden_page2.php");
        echo '<input class="btn btn-primary" name="ville" type="hidden" value="Belfort">';
        echo '<input class="btn btn-default" name="effectif" type="hidden" value="3100">';
        form_input_submit("UTBM");
        form_end();?>
</div>
</body>
</html>