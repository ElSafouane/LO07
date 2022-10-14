
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
			  <input type="hidden" name='action' value='<?php echo ($target)?>'>
			  <?php
              if ($args['target']=='vaccinCreated'){
                  echo '<label for="id">Label : </label><input type="text" name="label" value="Moderna">';
		        echo '<label for="id">Doses : </label><input type="number" name="doses" value="1">';
              }
              else{
              	echo '<label for="id">Vaccin : </label><select class="form-control" id="id" name="label" style="width: 200px;">';
                  foreach ($results as $label) {
                      printf("<option value='{$label->getId()}'>%d : %s</option>", $label->getId(), $label->getLabel());
                  }
                  echo "</select>";
                  echo "<br>";
                  echo '<label for="doses">Doses : </label><br><input type="number" name="doses" value="1">';

              }

			  ?>

      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Submit Form</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->



