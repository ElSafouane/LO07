
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';
    ?>

    <table class = "table table-striped table-bordered">
        <thead>
        <tr>
            <th scope = "col">Centre</th>
            <th scope = "col">Doses</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // La liste des patients est dans une variable $results
        foreach ($results as $element) {
            printf("<tr><td>%s</td><td>%d</td></tr>", $element->getId(), $element->getNom(),
                $element->getPrenom(), $element->getAdresse());
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewAll -->
  
  
  