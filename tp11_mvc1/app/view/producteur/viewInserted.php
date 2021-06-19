
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($valide!=1) {
     echo ("<h3>Le nouveau producteur a été ajouté </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>Nom = " . $_GET['nom'] . "</li>");
     echo ("<li>Prénom = " . $_GET['prenom'] . "</li>");
     echo ("<li>Région = " . $_GET['region'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du producteur</h3>");
     echo ("Veuillez remplir toutes les informations");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    