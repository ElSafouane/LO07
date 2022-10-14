
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentMenu.html';
      include $root . '/app/view/fragment/fragmentJumbotron.html';
      ?>

	  <form role="form" method='get' action='router2.php'>
		  <div class="form-group">
			  <input type="hidden" name='action' value='centreCreated'>

			  <label for="id">Label : </label><input type="text" name="label" value="UTT Vaccination">
			  <label for="id">Adresse : </label><input type="text" name="adresse" value="12 rue marie curie, 10000 Troyes" style="width: 300px;">

      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit Form</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



