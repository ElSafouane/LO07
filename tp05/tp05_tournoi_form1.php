<!DOCTYPE html>
<?php
require_once ('lo07_biblio_formulaire_bt.php');
?>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>TP05</title>
    <link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="my_css.css">

</head>
<body>
<div class="container">
    <div class="panel panel-success">
        <div class="panel-heading panel-title ">
            Exercice 3 : Constitution d’équipes de joueurs pour le tournoi LO07
        </div>
    </div>


        <?php
        form_begin("", "get", "tp05_tournoi_form2.php");
        echo "<h3>Nombre de joueurs de l'équipe</h3>";
        form_select("","Joueurs","",4,range(2,5));
        form_input_submit("Envoyer");
        form_end();
        ?>


</div>
</body>
</html>
