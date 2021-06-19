
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
    if ($results) {
     echo ("<h3>Le producteur a été supprimé </h3>");
     echo("<ul>");
     echo ("<li>id = " . $_GET["id"] . "</li>");
     echo ("<li>Nom = " . $_GET['nom'] . "</li>");
     echo ("<li>Prénom = " . $_GET['prenom'] . "</li>");
     echo ("<li>Région = " . $_GET['region'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de suppression du Producteur</h3>");
     echo ("id = " . $_GET['nom']);
     echo ("<br>Il appartient surement à la table récolte");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    