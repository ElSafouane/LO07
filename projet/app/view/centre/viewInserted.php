
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php

    if (($valide==0) AND ($update==0)) {
     echo ("<h3>Le nouveau centre a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>Label = " . $_GET['label'] . "</li>");
     echo ("<li>Adresse = " . $_GET['adresse'] . "</li>");
     echo("</ul>");
    }
    elseif(($valide==1) AND ($update==0)){
        echo ("<h3>Problème d'insertion du centre</h3>");
        echo ("Veuillez vérifier toutes les informations");
    }
    elseif ($update==1){
    	echo "<h3>Centre mis à jour</h3>";
        echo("<ul>");
        echo ("<li>Label = " . $_GET['label'] . "</li>");
        echo ("<li>Adresse = " . $_GET['adresse'] . "</li>");
        echo("</ul>");
    }
    else{
    	echo "<h3>Problème de mise à jour</h3>";
    	echo "Le centre demandé n'existe pas";
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    