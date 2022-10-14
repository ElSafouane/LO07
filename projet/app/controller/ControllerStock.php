<?php
require_once '../model/ModelStock.php';

class ControllerStock{

    // --- Liste des stocks
    public static function stockReadAll()
    {
        $results = ModelStock::getAllLabel();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAll.php';
        if (DEBUG)
            echo("ControllerStock : stockReadAll : vue = $vue");
        require($vue);
    }


    // Affiche le formulaire de creation d'un stock
    /*public static function stockCreate()
    {

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewInsert.php';
        require($vue);
    }*/


    // Affiche un formulaire pour récupérer les informations d'un nouveau stock.
    // La clé est gérée par le systeme et pas par l'internaute

    public static function stockCreated(){

        // ajouter une validation des informations du formulaire
        $resultat=1;
        $results=ModelStock::update(htmlspecialchars($_GET['centre']), htmlspecialchars($_GET['vaccin']), htmlspecialchars($_GET['quantite']));
        if ($results!=1){
            $results = ModelStock::insert(
                htmlspecialchars($_GET['centre']), htmlspecialchars($_GET['vaccin']), htmlspecialchars($_GET['quantite'])
            );
        }

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewInserted.php';
        require ($vue);

    }

    public static function stockGlobal(){
        $results = ModelStock::getSomme();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAll.php';
        if (DEBUG)
            echo("ControllerStock : stockGlobal : vue = $vue");
        require($vue);
    }

    public static function stockRead()
    {

        $resultscentre = ModelCentre::getAll();
        $resultsvaccin = ModelVaccin::getAll();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewInsert.php';
        if (DEBUG)
            echo("ControllerStock : stockReadAll : vue = $vue");
        require($vue);
    }
}
