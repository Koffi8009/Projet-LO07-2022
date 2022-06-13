
<!-- ----- début viewName -->

<?php 
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.php';
    ?> 

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
          <h2>Sélection d'un individu</h2>
         <!-- Champs caché pour ensuite afficher la page de cet individu -->
        <input type="hidden" name='action' value='individuPage'>   
        
        <!-- Champs avec tout les noms et prénom d'individu de la famille pour récupéré l'id -->
        <label for="id">Sélectionnez un individu : </label><select class="form-control" id="id" name="id">
            <?PHP
            foreach ($results as $element){
                echo "<option value=".$element->getId().">".$element->getNom()." : ".$element->getPrenom()."</option>";
            }
            ?>
        </select><br>
  
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewName -->