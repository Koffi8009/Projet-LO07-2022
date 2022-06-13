
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.php';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results) {
     echo ("<h3>Le nouvel élément a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>famille_id = " . $_SESSION['famille_id'] . "</li>");
     echo ("<li>individu_id = " . $_GET['id'] . "</li>");
     echo ("<li>event_id = " . $results . "</li>");
     echo ("<li>event_type = " . $_GET['type'] . "</li>");
     echo ("<li>event_date = " . $_GET['date'] . "</li>");
     echo ("<li>event_lieu = " . $_GET['lieu'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de création d'une famille</h3>");
     echo ("id = " . $_GET['nom']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted --> 


