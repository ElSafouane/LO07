
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

	        <input type="hidden" name="patient" value="<?php echo $patient_id; ?>">
		<?php
		if ($nbdoses_patient==0):
		?>
			<input type="hidden" name='action' value="rdvFirst">

			<label for="id">Selectionnez un centre pour effectuer votre 1ère dose: </label> <select class="form-control" id='id' name='centre' style="width: 300px">
                <?php
                foreach ($dosesDispo as $element) {
                    printf("<option value='{$element->getId()}'> %d : %s</option>", $element->getId(), $element->getLabel());
                }
                echo "</select>";
                echo ('<button class="btn btn-primary" type="submit">Submit form</button>');
                ?>


        </div>
	    <p/>
	        <?php
	        elseif ($nbdoses_patient<$dosesNessec) :
                if ($centreDosesRestantes==0):
                	echo "<h4>Vous ne pouvez vous faire vacciner pour le moment : il n'y a plus de doses de votre vaccin.</h4>";

                else:?>
                    <input type="hidden" name='action' value="rdvUpdate">
            <label for="id">Selectionnez un centre : </label> <select class="form-control" id='id' name='centre' style="width: 300px">
                    <?php
                    foreach ($centreDosesRestantes as $element) {
                    printf("<option value='{$element->getId()}'>%d : %s</option>", $element->getId(), $element->getLabel());

                }
                    echo "</select>";
                    echo ('<button class="btn btn-primary" type="submit">Submit form</button>');
                    endif;
                ?>

				</div>
				<p/>

			<?php else:?>
			<h3>Vous avez reçu toutes vos doses de vaccins </h3>
				<table class = "table table-striped table-bordered">
					<thead>
					<tr>
						<th scope = "col">centre</th>
						<th scope = "col">injection</th>
						<th scope = "col">vaccin</th>
					</tr>
					</thead>
					<tbody>
                    <?php
                    // La liste des vaccins est dans une variable $results
                    foreach ($results as $element) {
                        printf("<tr><td>%d</td><td>%d</td><td>%d</td></tr>", $element->getCentreId(),
                            $element->getInjection(), $element->getVaccinId());
                    }
                    ?>
					</tbody>
				</table>
			</div>
			<p/>
</select>
<?php endif;?>



    </form>
    <p/>
</div>
</body>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

