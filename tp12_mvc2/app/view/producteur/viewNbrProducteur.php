<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');

?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

      // $results contient un tableau avec la liste des clés.
?>
	  <table class = "table table-striped table-bordered">
		  <thead>
		  <tr>
			  <th scope = "col">Nombre Producteur</th>
			  <th scope = "col">region</th>
		  </tr>
		  </thead>
		  <tbody>
          <?php
          while ($ligne = $results->fetch()) {
              echo '<tr>';
              echo '<td>'. $ligne["count(id)"] . '</td>' . '<td>' . $ligne["region"] . '</td>';
              echo '</tr>';
          }
          ?>
		  </tbody>
	  </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

</body>

