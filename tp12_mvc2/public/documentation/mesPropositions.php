<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

    <body>
    <div class="container">
<?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    ?>

        <div class="panel panel-default">
          <div class="panel-heading">Première suggestion d'amélioration</div>
          <div class="panel-body">Ajout d'un portail de connexion permettant de se connecter directement à sa base de donnée pour pouvoir y ajouter un vin ou un producteur à partir d'une seule version d'un site Web.</div>
        </div>
	    <div class="panel panel-default">
		    <div class="panel-heading">Deuxième suggestion d'amélioration</div>
		    <div class="panel-body">Ajouter un mot de passe supplémentaire pour modifier les tables.</div>
	    </div>
    </div>
    <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

    </body>