<!DOCTYPE html>
<?php
$date = "Date";
$value="21 Février";
$age="Age";
$valeur="19";
setcookie($date, $value);
setcookie($age, $valeur);
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

    <div class="panel-success panel">
        <div class="panel-heading">Exercice 3: Questions 6</div>
    </div>
    <a href="lo07_analyse_superglobales.php">LO07 Formulaire</a>

    <div class="panel panel-success">
        <div class="panel-heading">
            Question 8
        </div>
        <div class="panel-body">
            L'erreur du script est que le cookie est posé après la balise html, on doit toujours la placer avant.
        </div>
    </div>
</div>
</body>
</html>
