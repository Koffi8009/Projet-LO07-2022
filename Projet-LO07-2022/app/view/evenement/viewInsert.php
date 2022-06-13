
<!-- ----- début viewInsert -->

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
          <h2>Ajout d'un évènement</h2>
         <!-- Champs caché pour ensuite créer l'évènement -->
        <input type="hidden" name='action' value='evenementCreated'>   
        
        <!-- Champs avec tout les noms et prénom d'individu de la famille pour récupéré l'id -->
        <label for="id">Sélectionnez un individu : </label><select class="form-control" id="id" name="id">
            <?PHP
            foreach ($results as $element){
                echo "<option value=".$element->getId().">".$element->getNom()." : ".$element->getPrenom()."</option>";
            }
            ?>
        </select><br>
                
        <!--Champs pour choisir le type d'évènement-->
        <label for="type">Sélectionnez un type d'évènement : </label><select class="form-control" id="type" name="type">
            <option value='NAISSANCE'>NAISSANCE</option>
            <option value='DECES'>DECES</option>
        </select><br>
        
        <!--Champs pour choisir la date de l'évènement-->
        <label for="date">Date (AAAA-MM-JJ) ? </label><input class="form-control" type="text" name='date' size='75' value=''><br> 
        
        <!--Champs pour choisir le lieu de l'évènement-->
        <label for="lieu">Lieu ? </label><input class="form-control" type="text" name='lieu' size='75' value=''><br>
      </div>
      
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->