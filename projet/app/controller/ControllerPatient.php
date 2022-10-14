<?php
require_once '../model/ModelPatient.php';

class ControllerPatient
{

    // --- Liste des patients
    public static function patientReadAll()
    {
        $results = ModelPatient::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewAll.php';
        if (DEBUG)
            echo("ControllerPatient : patientReadAll : vue = $vue");
        require($vue);
    }


    // Affiche le formulaire de creation d'un patient
    public static function patientCreate()
    {

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsert.php';
        require($vue);
    }


    // Affiche un formulaire pour récupérer les informations d'un nouveau patient.
    // La clé est gérée par le systeme et pas par l'internaute

    public static function patientCreated()
    {
        // ajouter une validation des informations du formulaire

        if ($_GET['nom'] == '' or $_GET['prenom'] == '' or $_GET['adresse'] == '') {
            $valide = 1;
            $update=0;
        } else {
            $valide=0;
            $results=ModelPatient::update(htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']));
            $update=1;
            if ($results!=1){
                $resultat = ModelPatient::insert(
                    htmlspecialchars($_GET['nom']),htmlspecialchars($_GET['prenom']) , htmlspecialchars($_GET['adresse'])
                );
                $update=0;
            }
        }
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInserted.php';
        require($vue);

    }
}
