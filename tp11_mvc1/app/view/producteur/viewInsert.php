
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router1.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='producteurCreated'>
        <label for="id">Nom : </label><input type="text" name='nom' size='10' value='EL MCHANTEF'>
        <label for="id">Prénom : </label><input type="text" name='prenom' value='Safouane'>
        <label for="id">Région : </label><input type="text" name='region' value='Ile-De-France'>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>

<!-- ----- fin viewInsert -->



