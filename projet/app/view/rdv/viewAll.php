
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

			<input type="hidden" name='action' value="rdvDossier">

			<label for="id">Selectionnez un patient : </label> <select class="form-control" id='id' name='patient' style="width: 300px">
                <?php
                foreach ($resultspatient as $element) {
                    printf("<option value='{$element->getId()}'>%d : %s : %s</option>", $element->getId(), $element->getNom(), $element->getPrenom());
                }
                ?>
			</select>

		</div>
		<p/>
		<button class="btn btn-primary" type="submit">Submit form</button>
	</form>
	<p/>
</div>

<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

