<?php
require_once '../model/ModelCentre.php';

class ControllerCentre
{

    // --- Liste des centres
    public static function centreReadAll()
    {
        $results = ModelCentre::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewAll.php';
        if (DEBUG)
            echo("ControllerCentre : centreReadAll : vue = $vue");
        require($vue);
    }


    // Affiche le formulaire de creation d'un centre
    public static function centreCreate()
    {

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewInsert.php';
        require($vue);
    }


    // Affiche un formulaire pour récupérer les informations d'un nouveau centre.
    // La clé est gérée par le systeme et pas par l'internaute

    public static function centreCreated()
    {
        // ajouter une validation des informations du formulaire

        if ($_GET['label'] == '' or $_GET['adresse'] == '') {
            $valide = 1;
            $update=0;
        } else {
            $valide=0;
            $results=ModelCentre::update(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['adresse']));
            $update=1;
                if ($results!=1){
                    $resultat = ModelCentre::insert(
                        htmlspecialchars($_GET['label']), htmlspecialchars($_GET['adresse'])
                    );
                    $update=0;
                }
        }
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/centre/viewInserted.php';
        require($vue);

    }
}
