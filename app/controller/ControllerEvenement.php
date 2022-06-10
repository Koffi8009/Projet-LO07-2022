
<!-- ----- debut ControllerEvenenment -->

<?php

require_once '../model/ModelEvenement.php';

class ControllerEvenement {
    
    // --- page d'acceuil
    public static function genealogieAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewAccueil.php';
  if (DEBUG)
   echo ("ControllerVin : caveAccueil : vue = $vue");
  require ($vue);
 }
}

?>