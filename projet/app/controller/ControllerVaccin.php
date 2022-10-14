<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin{

    public static function vaccinAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccin : vaccinAccueil : vue = $vue");
        require ($vue);
    }


    // --- Liste des vaccins
    public static function vaccinReadAll() {
        $results = ModelVaccin::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewAll.php';
        if (DEBUG)
            echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
        require ($vue);
    }




    // Affiche le formulaire de creation d'un vaccin
    public static function vaccinCreate($args) {

        $target=$args['target'];
        $results=ModelVaccin::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInsert.php';
        require ($vue);
    }


    // Affiche un formulaire pour récupérer les informations d'un nouveau vaccin.
    // La clé est gérée par le systeme et pas par l'internaute

    public static function vaccinCreated() {
        // ajouter une validation des informations du formulaire

        if ($_GET['label'] == ''or $_GET['doses']==''){
            $valide=1;
        }
        else {
            $results = ModelVaccin::insert(
                htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses']));
            $valide=0;
        }
        $update=0;
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInserted.php';
        require ($vue);

    }

    public static function vaccinUpdate(){

        $results=ModelVaccin::update(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses']));
        $update=1;
        $valide=2;

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInserted.php';
        require ($vue);

    }


}