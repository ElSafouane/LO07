<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');

?>
<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

      // $results contient un tableau avec la liste des clés.

echo '<table class="table-bordered table"> ';
while ($ligne = $results->fetch()) {
    echo '<tr class="success">';
    echo '<td>'. $ligne["count(id)"] . '</td>' . '<td>' . $ligne["region"] . '</td>';
    echo '</tr>';
}
echo '</table>';
?>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

</body>

