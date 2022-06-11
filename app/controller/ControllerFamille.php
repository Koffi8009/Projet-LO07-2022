
<!-- ----- debut ControllerFamille -->

<?php
session_start();
require '../model/ModelFamille.php';

class ControllerFamille {
    
    // --- Liste des familles
    public static function familleReadAll() {
        $results = ModelFamille::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $_SESSION['titre']="Pas de famille sélectionnée";
        $vue = $root . '/app/view/famille/viewAll.php';
        if (DEBUG)
            echo ("ControllerFamille : familleReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche un formulaire pour sélectionner un id qui existe
    public static function familleReadId() {
        $results = ModelFamille::getAllName();
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/famille/viewId.php';
        require ($vue);
    }

    // Affiche une famille particulière (id)
    public static function familleReadOne() {
        $famille_nom = $_GET['nom'];
        $results = ModelFamille::getOne($famille_nom);
        $_SESSION['titre']=$_GET['nom'];
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/famille/viewSelection.php';
        require ($vue);
    }

    // Affiche le formulaire de creation d'une famille
    public static function familleCreate() {
        $_SESSION['titre']="Pas de famille sélectionnée";
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
            $results = ModelFamille::insert(
                htmlspecialchars($_GET['nom'])
            );
        }
        $_SESSION['titre']=$_GET['nom'];
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/famille/viewInserted.php';
        require ($vue);
 }
    
}