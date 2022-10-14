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
            <h3>Documentation de l'innovation 2</h3>
        </div>
        <div class="panel-body">
            <p>
                L'innovation 2 nous permet de mettre à jour un patient. On peut choisir le patient que l'on veut mettre à jour puis modifier ses informations.
                Cela peut-être pratique lorsque le patient à changer d'adresse. Ne pouvant pas supprimer de patient,
                cette innovation est donc egalement utile lorsque les informations ont été mal rempli au cours de l'ajout du patient.
            </p>
            <p>
                Pour obtenir les informations necessaires il a fallu faire tout d'abord une page de selection (viewUpdate), sur laquelle l'utilisateur va pouvoir choisir le patient à mettre à jour.
                Après la selction, on affiche un formulaire (viewReplace) dans lequel on peut remplacer les informations du patient. Lorsque ce formulaire est envoyé, on récupère les infromations transmises
                et on 'update' notre table patient, pour lequel le patient(id) correspond au patient selectionner dans la première étape. La mise à jour se fait avec les valeurs nom, prenom, adresse rentrée préalablement
                dans le formulaire. On obtient donc un "nouveau" patient qui à écrasé l'ancien 'mise à jour).
            </p>
        </div>
    </div>

</div>
</body>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
