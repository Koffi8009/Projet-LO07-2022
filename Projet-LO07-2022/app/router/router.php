
<!-- ----- debut Router -->
<?php
if (empty($_SESSION['titre']))
    session_start();
require '../controller/ControllerEvenement.php';
require '../controller/ControllerFamille.php';
require '../controller/ControllerIndividu.php';
require '../controller/ControllerLien.php';

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = $param["action"];
unset($param['action']);
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    case "evenementReadAll" :
    case "evenementCreate" :
    case "evenementCreated" :
        ControllerEvenement::$action();
        break;
    case "familleReadAll" :
    case "familleCreate" :
    case "familleCreated" :
    case "familleReadId" :
    case "familleReadOne" :
        ControllerFamille::$action();
        break;
    case "individuReadAll" :
    case "individuCreate" :
    case "individuCreated" :
    case "individuReadOne" :
    case "individuPage" :
        ControllerIndividu::$action($args);
        break;
    case "lienReadAll" :
    case "lienParentCreate" :
    case "lienParentCreated" :
    case "lienUnionCreate" :
    case "lienUnionCreated" :
        ControllerLien::$action();
        break;
    
    //Tâche par défaut
    default :
        $action = "genealogieAcceuil";
        ControllerEvenement::genealogieAccueil();
}


?>

<!-- ----- fin Router -->
