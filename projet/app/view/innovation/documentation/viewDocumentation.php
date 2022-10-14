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
                <h3>Documentation de l'innovation 1</h3>
            </div>
            <div class="panel-body">
                <p>
                    Pour l'innovation 1 nous avons voulu affiché les patients qui ne sont pas encore vacciné. Cette donnée semble importante pour qualqu'un qui utilise la base de donnée
                    car elle permet de repérer facilement la quantité de population qui n'est pas encore vacciné et donc d'organiser le réapprovisionnement des centres.
                </p>
                <p>
                    Pour obtenir ccela, on selectionne tous les id de la table patient et on essaie de faire correspondre avec le patient_id de la table rendezvous.
                    C'est-à-dire qu'on recherche les patients qui sont dans la table rendezvous donc qui ont reçu au minimum une dose.
                Quand il y a correspondance, il y a des valeurs à la fois dans les patient.id et rendezvous.patient_id (la même valeur puisque c'est la condition de jointure).
                Quand il n'y a pas de ligne de rendezvous en correspondance, rendezvous.patient_id prend la valeur NULL.
                En affichant que les lignes pour lesquelles rendezvous.patient_id IS NULL, on affiche tous les patients qui n'existent pas dans la rendezvous, donc qui ne sont pas vaccinés.
                </p>
            </div>
        </div>

    </div>
    </body>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>
