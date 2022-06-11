
<!-- ----- début viewSelection -->
<?php

require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
      <?php
        include $root . '/app/view/fragment/fragmentMenu.html';
        include $root . '/app/view/fragment/fragmentJumbotron.php';
        ?>

      <h2>Confirmation de la sélection</h2>
        <?php
        // La liste des familles est dans une variable $results             
        foreach ($results as $element) {
            printf("La famille <b>%s (%d)</b> est maintenant sélectionnée.", $element->getNom(), 
            $element->getId());
        }
        ?>
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewSelection -->
