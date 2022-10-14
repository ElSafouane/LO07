
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentMenu.html';
    include $root . '/app/view/fragment/fragmentJumbotron.html';

    $cols = $results[0];
    $data = $results[1];
    ?>

	<table class = "table table-striped table-bordered">
		<thead>
		<tr>
            <?php
            foreach ($cols as $noms){
                echo "<th>$noms</th>";
            }

            ?>
		</tr>
		</thead>
		<tbody>
        <?php

        foreach ($data as $value){
            echo ("<tr>");
            foreach ($cols as $attributs){
                echo ("<td>$value[$attributs]</td>");
            }
            echo ("</tr>");
        }
        ?>
		</tbody>
	</table>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewAll -->


