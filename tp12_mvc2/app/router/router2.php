
<!-- ----- debut Router2 -->
<?php
require ('../controller/ControllerVin.php');
require ('../controller/ControllerProducteur.php');
require ('../controller/ControllerCave.php');
require ('../controller/ControllerRecolte.php');

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
    case "producteurReadAll" :
    case "producteurReadOne" :
    case "producteurReadId" :
    case "producteurCreate" :
    case "producteurCreated" :
    case "sansDoublon" :
    case "nbrProducteur" :
	case "producteurDeleted" :
        ControllerProducteur::$action($args);
        break;

    case "vinReadAll" :
    case "vinReadOne" :
    case "vinReadId" :
    case "vinCreate" :
    case "vinCreated" :
	case "vinDeleted" :

        ControllerVin::$action($args);
        break;

	case "recolteReadAll" :
	case "recolteRead":
	case "recolteCreated":
        ControllerRecolte::$action($args);
        break;

    case "mesPropositions" :

        ControllerCave::$action($args);
        break;
    default:
        $action = "caveAccueil";
        ControllerCave::$action($args);
        break;
}


?>
<!-- ----- Fin Router1 -->

