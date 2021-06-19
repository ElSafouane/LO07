
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
     echo ("<h3>Le vin a été supprimé </h3>");
     echo("<ul>");
     echo ("<li>id = " . $_GET["id"] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème de suppression du Vin</h3>");
     echo ("id = " . $_GET['id']);
     echo ("<br>Il est probable qu'il soit présent dans la table des récoltes");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    