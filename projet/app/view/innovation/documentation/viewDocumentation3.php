<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    ?>
    <div class="panel panel-title">
        <div class="panel-heading">
            <h3>Documentation de l'innovation 3</h3>
        </div>
        <div class="panel-body">
            <p>
                Nous avons dans notre dernière innovation décidé d’utiliser nos deux tables vaccin et rendez-vous pour afficher le nombre de patients par Vaccins.
                Cette fonction peut être très utiles pour une personne souhaitant répertorier rapidement le vaccin le plus injecté  permis tous les patients s’étant fait
                vaccinés dans les centres présents dans notre base de données.
            </p>
            <p>
                Pour faire cela nous avons selectionné les tuples pour lesquels tous les vaccins.id (clé primaire de la table vaccin)
                correspondent au rendezvous.vaccin_id (clé primaire de la table rendezvous et clé étrangère de la table vaccin). Ensuite nous sélectionnons le nom du vaccin avec
                le nom de colonne "label" de la table vaccin associé avec le nombre de patients possédant ce label dans la table rendezvous . Dans le but de regrouper ces valeurs par nom de vaccin
                nous groupons les valeurs par label.
            </p>
        </div>
    </div>

</div>
</body>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
