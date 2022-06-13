<!-- ----- debut ControllerIndividu -->

<?php
require_once '../model/ModelIndividu.php';

class ControllerIndividu {

    public static function individuReadAll() {
        $results = ModelIndividu::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';

        $vue = $root . '/app/view/individu/viewAll.php';
        if (DEBUG)
            echo ("ControllerIndividu : individuReadAll : vue = $vue");
        require ($vue);
    }
    
    // Affiche le formulaire de creation dun individu
    public static function individuCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/individu/viewInsert.php';
        require ($vue);
    }
    
     public static function individuCreated() {
        /*// ajouter une validation des informations du formulaire
        $valide=0;
        if ($_GET['nom']==''){
            $valide=1;
        }
        else{
            $results = ModelFamille::insert(
                htmlspecialchars($_GET['nom'])
            );
        }*/
        $results = ModelIndividu::insert(
                htmlspecialchars($_GET['nom']),htmlspecialchars($_GET['prenom']),
                htmlspecialchars($_GET['sexe']));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/individu/viewInserted.php';
        require ($vue);
 }
 
    public static function individuReadOne(){
        $results = ModelIndividu::getAll();
        
        //Construction de la vue pour choisir un individu
        include 'config.php';
        $vue = $root . '/app/view/individu/viewName.php';
        require($vue);
    }
    
    public static function individuPage($arg){
        //Demande de toutes les infos sur l'individu
        $results = ModelIndividu::getInfos($arg['id']);
        
        //Construction de la vue page d'un individu
        include 'config.php';
        $vue = $root . '/app/view/individu/viewPage.php';
        require($vue);
    }
}