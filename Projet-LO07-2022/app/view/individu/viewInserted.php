
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
    if ($results!=-1) {
     echo ("<h3>Confirmation de création d'un individu</h3>");
     echo("<ul>");
     echo ("<li>famille_id = " . $_SESSION['famille_id'] . "</li>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>nom = " . $_GET['nom'] . "</li>");
     echo ("<li>prenom = " . $_GET['prenom'] . "</li>");
     echo ("<li>sexe = " . $_GET['sexe'] . "</li>");
     echo ("<li>pere = 0</li>");
     echo ("<li>mere = 0</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de création de l'individu</h3>");
     echo ("Nom = " . $_GET['nom']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted --> 


