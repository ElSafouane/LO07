<?php
require_once '../model/ModelRecolte.php';
class ControllerRecolte{


    public static function recolteReadAll(){
        $results = ModelRecolte::getAll();
        include "config.php";
        $vue = $root . '/app/view/recolte/viewAll.php';
        if (DEBUG)
            echo ("ControllerRecolte : recolteReadAll : vue = $vue");
        require ($vue);
    }

    public static function recolteReadId($args) {
        if (DEBUG) echo ("ControllerRecolte:recolteReadId:begin<br>");
        $results = ModelRecolte::getAllId();

        $target=$args['target'];
        if (DEBUG) echo ("ControllerRecolte:recolteReadId:target=$target<br>");


        include 'config.php';
        $vue = $root . '/app/view/recolte/viewId.php';
        require ($vue);
    }

    public static function recolteRead()
    {
        $resultsvin = ModelVin::getAll();
        $resultsprod = ModelProducteur::getAll();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewAjout.php';
        if (DEBUG)
            echo("ControllerRecolte : recolteReadAll : vue = $vue");
        require($vue);
    }

    public static function recolteReadOne() {
        $recolte_id = $_GET['id'];
        $results = ModelRecolte::getOne($recolte_id);

        include 'config.php';
        $vue = $root . '/app/view/recolte/viewAll.php';
        require ($vue);
    }

    /*public static function recolteCreate() {
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewInsert.php';
        require ($vue);
    }*/


    public static function recolteCreated() {

        $results=ModelRecolte::update(htmlspecialchars($_GET['producteur']), htmlspecialchars($_GET['vin']), htmlspecialchars($_GET['quantite']));
        if ($results!=1){
            $resultat = ModelRecolte::insert(
                htmlspecialchars($_GET['producteur']), htmlspecialchars($_GET['vin']), htmlspecialchars($_GET['quantite'])
            );
       }


        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/recolte/viewInserted.php';
        require ($vue);
    }



}

?>
