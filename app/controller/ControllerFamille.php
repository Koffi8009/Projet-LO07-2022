
<!-- ----- debut ControllerFamille -->

<?php

require '../model/ModelFamille.php';

class ControllerFamille {
    
    // --- Liste des familles
    public static function familleReadAll() {
        $results = ModelFamille::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/famille/viewAll.php';
        if (DEBUG)
            echo ("ControllerFamille : familleReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function familleReadId($args) {
        $results = ModelFamille::getAllId();
        $target=$args['target'];
        if (DEBUG) echo ("ControllerFamille:familleReadId : target = $target<br>");
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/famille/viewId.php';
        require ($vue);
    }

    // Affiche une famille particulière (id)
    public static function familleReadOne() {
        $famille_id = $_GET['id'];
        $results = ModelFamille::getOne($famille_id);

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/famille/viewAll.php';
        require ($vue);
    }

    // Affiche le formulaire de creation d'une famille
    public static function familleCreate() {
  
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/famille/viewInsert.php';
        require ($vue);
    }

    // Affiche un formulaire pour récupérer les informations d'une nouvelle famille.
    // La clé est gérée par le systeme et pas par l'internaute
    public static function familleCreated() {
        // ajouter une validation des informations du formulaire
        $valide=0;
        if ($_GET['nom']==''){
            $valide=1;
        }
        else{
            $results = ModelFamaille::insert(
                htmlspecialchars($_GET['nom'])
            );
        }
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/famille/viewInserted.php';
        require ($vue);
 }
    
}