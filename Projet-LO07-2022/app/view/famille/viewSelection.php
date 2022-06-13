
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
        // La famille selectionnée est dans $results             
        printf("<p>La famille <b>%s</b> est maintenant sélectionnée.</p>", $_SESSION['titre']);
        ?>
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

  <!-- ----- fin viewSelection -->
