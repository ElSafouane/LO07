<?php
require_once '../model/ModelProducteur.php';
class ControllerProducteur{


    public static function producteurReadAll(){
        $results = ModelProducteur::getAll();
        include "config.php";
        $vue = $root . '/app/view/producteur/viewAll.php';
        if (DEBUG)
            echo ("ControllerProducteur : producteurReadAll : vue = $vue");
        require ($vue);
    }

    public static function producteurReadId($args) {
        $results = ModelProducteur::getAllId();

        $target=$args['target'];
        if (DEBUG) echo ("ControllerProducteur:producteurReadId:target=$target<br>");


        include 'config.php';
        $vue = $root . '/app/view/producteur/viewId.php';
        require ($vue);
    }
    
    
    public static function producteurReadOne() {
        $producteur_id = $_GET['id'];
        $results = ModelProducteur::getOne($producteur_id);

        include 'config.php';
        $vue = $root . '/app/view/producteur/viewAll.php';
        require ($vue);
    }

    public static function producteurCreate() {
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewInsert.php';
        require ($vue);
    }


    public static function producteurCreated() {
        $valide=0;
        if ($_GET['nom']=='' or $_GET['prenom']=='' or $_GET['region']==''){
            $valide=1;
        }
        else{
            $results = ModelProducteur::insert(
                htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
            );
        }
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewInserted.php';
        require ($vue);
    }

    public static function sansDoublon(){
        $results= ModelProducteur::sansDoublon();
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewSansDoublon.php';
        require ($vue);
    }

    public static function nbrProducteur(){
        $results=ModelProducteur::nbrProducteur();
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewNbrProducteur.php';
        require ($vue);
    }

    public static function producteurDeleted() {
        if (DEBUG) echo ("ControllerProducteur::producteurReadId:begin<br>");
        $results = ModelProducteur::delete($_GET['id']);


        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/producteur/viewDeleted.php';
        require ($vue);
    }

}

?>
