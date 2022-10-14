
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

			<input type="hidden" name='action' value="stockCreated">

			<label for="id">Selectionnez un centre : </label> <select class="form-control" id='id' name='centre' style="width: 300px">
                <?php
                foreach ($resultscentre as $element) {
                    printf("<option value='{$element->getId()}'>%d : %s</option>", $element->getId(), $element->getLabel());
                }
                ?>
			</select>

			<label for="id">Selectionnez un vaccin : </label> <select class="form-control" id='id' name='vaccin' style="width: 300px">
                <?php
                foreach ($resultsvaccin as $element) {
                    printf("<option value='{$element->getId()}'>%d : %s</option>", $element->getId(), $element->getLabel());
                }
                ?>
			</select>
			<label for="id">Doses supplémentaires : </label><br>
			<input name='quantite' value="10">

		</div>
		<p/>
		<button class="btn btn-primary" type="submit">Submit form</button>
	</form>
	<p/>
</div>

<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

