<!DOCTYPE html>
<?php
require ('lo07_biblio_formulaire_bt.php');
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
	<div class="panel panel-info">
		<div class="panel-heading panel-title">
			Participants:
		</div>
	</div>
        <?php
        form_begin("", "get", "tp05_tournoi_action.php");
        for ($player=1; $player<=$_GET["Joueurs"];$player=$player+1){
            form_input_text("Nom du joueur ".$player,"nomJ ".$player,"","");
            form_input_text("Prénom du joueur ".$player,"prenomJ ".$player,"","");
            form_input_text("Mail du joueur ".$player,"MailJ ".$player,"","");
            echo "<hr>";
        }
        form_input_submit("Envoyer");
        form_end();
        ?>
</div>
</body>
</html>