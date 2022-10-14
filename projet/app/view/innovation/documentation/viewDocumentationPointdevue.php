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
            <h3>Point de vue global sur le projet</h3>
        </div>
        <div class="panel-body">
            <p>
                Ce projet réalisé dans le cadre de l’UE LO07 fut très intéressant sur le plan technique. Etant, les deux personnes du binôme en TC, nous avons pu découvrir
                de nombreux aspects liés aux bases de données et aux développement web.
                Le projet a représenté la première occasion, pour nous, de mettre en pratique nos compétences et celles acquises, tout au long du semestre, les bases de données et sur le modèle MVC.
                On a ainsi pu voir comment implémenter une interface web gérant une base de donnée de manière plus complexe que lors des TP.
                Certaines pages nécessitaient une réflexion plus poussée sur le développement des fonctions, ce qui a permis de rallonger la vie de ce projet.
                Les pages concernants les stocks et les rendez-vous ont été celles sur lesquelles nous avons le plus pris de temps. Pour avancer nous avons du comprendre 'parfaitement' le fonctionnement
                à la fois des bases sql et du code web ce qui est donc très bénéfique.
                Nous sommes contents d'avoir fait cette matière et d'avoir pu effectuer ce projet.
            </p>
        </div>
    </div>

</div>
</body>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
