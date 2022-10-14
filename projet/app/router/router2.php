
<!-- ----- debut Router2 -->
<?php
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerRdv.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = $param["action"];

$args= $param;

// --- Liste des méthodes autorisées
switch ($action) {


	case "vaccinReadAll":
	case "vaccinCreate":
	case "vaccinCreated":
	case "vaccinAccueil":
	case "vaccinUpdate":
		ControllerVaccin::$action($args);
	break;
    case "centreReadAll":
    case "centreCreate":
    case "centreCreated":
        ControllerCentre::$action($args);
        break;

    case "patientReadAll":
    case "patientCreate":
    case "patientCreated":
        ControllerPatient::$action($args);
        break;
    case "stockReadAll":
    case "stockRead":
    case "stockCreate":
    case "stockCreated":
	case "stockGlobal":
        ControllerStock::$action($args);
        break;
    case "rdvReadAll":
    case "rdvRead":
    case "rdvCreate":
    case "rdvCreated":
	case "rdvDossier":
	case "rdvFirst":
	case "rdvUpdate":
	case "mapItineraire":
	case "innovationGetAll":
	case "innovationUpdate":
	case "innovationUpdated":
	case "innovationVacc":
	case "patientNonVacc":
	case "documentation1":
	case "documentation2":
	case "documentation3":
	case "pointdevue":
        ControllerRdv::$action($args);
        break;
    default:
        $action = "vaccinAccueil";
        ControllerVaccin::$action($args);
        break;
}


?>
<!-- ----- Fin Router1 -->

