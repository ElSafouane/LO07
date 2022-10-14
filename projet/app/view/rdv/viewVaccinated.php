
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

    if ($affiche==0) :
        echo ("<h3>Vous allez être vacciné avec le vaccin : ");
        printf($vaccin_id);
        echo "</h3>";?>
	<table class = "table table-striped table-bordered">
		<thead>
		<tr>
			<th scope = "col">id</th>
			<th scope = "col">label</th>
			<th scope = "col">doses</th>
		</tr>
		</thead>
		<tbody>
        <?php
        // La liste des vaccins est dans une variable $results
        foreach ($results as $element) {
            printf("<tr><td>%d</td><td>%s</td><td>%d</td></tr>", $element->getId(),
                $element->getLabel(), $element->getDoses());
        }
        ?>
		</tbody>
	</table>
	<?php
    else :
        echo ("<h3>Les doses ont été ajoutées</h3>");
     endif;

    echo("</div>");

    include $root . '/app/view/fragment/fragmentFooter.html';
    ?>
    <!-- ----- fin viewInserted -->


