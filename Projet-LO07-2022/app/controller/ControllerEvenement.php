<!-- ----- debut ControllerEvenenment -->

<?php
require_once '../model/ModelEvenement.php';
require_once '../model/ModelIndividu.php';

class ControllerEvenement {
    
    // --- page d'acceuil
    public static function genealogieAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewAccueil.php';
  if (DEBUG)
   echo ("ControllerVin : caveAccueil : vue = $vue");
  require ($vue);
 }
 
 
 // --- Liste des évènements
    public static function evenementReadAll() {
        $results = ModelEvenement::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/evenement/viewAll.php';
        if (DEBUG)
            echo ("ControllerFamille : evenementReadAll : vue = $vue");
        require ($vue);
    }
 
    public static function evenementCreate() {
        //récupération des individus
        $results = ModelIndividu::getAll();
        // ----- Construction chemin de la vue du formulaire d'ajout
        include 'config.php';
        $vue = $root . '/app/view/evenement/viewInsert.php';
        require ($vue);
    }
 
    public static function evenementCreated() {      
            $results = ModelEvenement::insert(htmlspecialchars($_GET['id'])
                    ,htmlspecialchars($_GET['type']),htmlspecialchars($_GET['date']),
                    htmlspecialchars($_GET['lieu']));
           
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/evenement/viewInserted.php';
        require ($vue);
 }
 
}

?>