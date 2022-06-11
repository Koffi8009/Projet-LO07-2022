<!-- ----- debut fragmentJumbotron -->

<?php 

if (isset($_SESSION['titre']))
    $titre = $_SESSION['titre'];

?>

<div class="jumbotron">
    <h1> <?php 
    
    if (strcmp($titre, "Pas de famille sélectionnée")==0){
      echo "$titre";  
    } else {
      echo "FAMILLE $titre";  
    }
     
    
    ?> </h1>
</div>
<p/>
<!-- ----- fin fragmentJumbotron -->

