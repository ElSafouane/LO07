
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

        echo ("<h3>Le patient a été mis à jour </h3>");
        echo("<ul>");
        echo ("<li>Nom = " . $_GET['nom'] . "</li>");
        echo ("<li>Prénom = " . $_GET['prenom'] . "</li>");
        echo ("<li>Adresse = " . $_GET['adresse'] . "</li>");
        echo("</ul>");
    echo("</div>");

    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    