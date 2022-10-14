<?php
require_once '../model/ModelRdv.php';

class ControllerRdv
{

    // --- Liste des rdvs
    public static function rdvReadAll()
    {
        $results = ModelRdv::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewAll.php';
        if (DEBUG)
            echo("ControllerRdv : rdvReadAll : vue = $vue");
        require($vue);
    }


    // Affiche le formulaire de creation d'un rdv
    public static function rdvCreate()
    {

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewInsert.php';
        require($vue);
    }


    public static function rdvRead()
    {

        $resultspatient = ModelPatient::getAll();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewAll.php';
        if (DEBUG)
            echo("ControllerRdv : rdvReadAll : vue = $vue");
        require($vue);
    }


    // Affiche un formulaire pour récupérer les informations d'un nouveau rdv.
    // La clé est gérée par le systeme et pas par l'internaute

    /*public static function rdvCreated()
    {
        // ajouter une validation des informations du formulaire

        if ($_GET['centre'] == '' or $_GET['patient'] == '' or $_GET['injection'] == '') {
            $valide = 1;
            $update=0;
        } else {
            $valide=0;
            $results=ModelRdv::update(htmlspecialchars($_GET['centre']), htmlspecialchars($_GET['patient']), htmlspecialchars($_GET['injection']));
            $update=1;
            if ($results!=1){
                $resultat = ModelRdv::insert(
                    htmlspecialchars($_GET['centre']),htmlspecialchars($_GET['patient']) , htmlspecialchars($_GET['injection'])
                );
                $update=0;
            }
        }
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewInserted.php';
        require($vue);

    }*/

    public static function rdvDossier(){
        $nbdoses_patient = ModelRdv::check(htmlspecialchars($_GET['patient']));
        $dosesDispo = ModelRdv::checkDosesCentre();
        $patient_id = $_GET['patient'];
        $dosesNessec = ModelRdv::getDoses(htmlspecialchars($_GET['patient']));
        $vaccin_id = ModelRdv::getVaccin(htmlspecialchars($_GET['patient']));
        $centreDosesRestantes = ModelRdv::getCentre($vaccin_id);
        $results = ModelRdv::getAll(htmlspecialchars($_GET['patient']));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewDossier.php';
        require($vue);

    }

    public static function rdvFirst(){
        $patient_id = $_GET['patient'];
        $vaccin_id=ModelRdv::maxdoses(htmlspecialchars($_GET['centre']));
        $centre_id=$_GET['centre'];


        $update = ModelRdv::update($patient_id, $vaccin_id, $centre_id);
            if ($update==0){
                $resultat = ModelRdv::insert($centre_id, $patient_id, 1,$vaccin_id);
            }
        $results = ModelVaccin::getAll();

        $affiche = 0;
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewVaccinated.php';
        require($vue);

    }

    public static function rdvUpdate(){
        $patient_id = $_GET['patient'];
        $vaccin_id = ModelRdv::getVaccin(htmlspecialchars($_GET['patient']));
        $centre_id=$_GET['centre'];
        $injection = ModelRdv::injection(htmlspecialchars($_GET['patient']));
        $injection=$injection+1;
        $update = ModelRdv::update($patient_id, $vaccin_id, $injection,$centre_id);
        $results=ModelRdv::getResults(htmlspecialchars($_GET['patient']), $centre_id);

// ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rdv/viewInserted.php';
        require($vue);

    }





    // ----- Fonction Innovation







    public static function patientNonVacc(){

        $results=ModelRdv::getPatientNonVacc();

// ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewInnov1.php';
        require($vue);
    }



    public static function innovationGetAll(){
        $patient=ModelPatient::getAll();

// ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewUpdate.php';
        require($vue);
    }

    public static function innovationUpdate(){
        $patient_id = $_GET['patient'];
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewReplace.php';
        require($vue);

    }
    public static function innovationUpdated(){
        $patient_id=$_GET['patient'];
        $results=ModelRdv::updateInnov($patient_id, htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewUpdated.php';
        require($vue);

    }
    public static function innovationVacc(){
        $results = ModelRdv::innov1();

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovation/viewInnov1.php';
        require($vue);
    }






    // ----- Fonction Documentation





public static function documentation1(){
// ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/innovation/documentation/viewDocumentation.php';
    require($vue);
}
    public static function documentation2(){
// ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovation/documentation/viewDocumentation2.php';
        require($vue);
    }
    public static function documentation3(){
// ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovation/documentation/viewDocumentation3.php';
        require($vue);
    }
    public static function pointdevue(){
// ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/innovation/documentation/viewDocumentationPointdevue.php';
        require($vue);
    }
}
