
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
<input type="hidden" name='action' value="mapItineraire">
            <label for="id">Selectionnez un centre : </label> <select class="form-control" id='id' name='centre' style="width: 300px">
                    <?php
                    foreach (getPatientNonVacc as $element) {
                        printf("<option value='{$element->getId()}'>%d : %s: %s</option>", $element->getId(), $element->getNom(), $element->getPrenom());

                    }
                    ?>
            </select>
            <br>
            <label for="id">Saisissez votre adresse : </label><br>
            <input type="text" name="adresse" placeholder="Inserez votre adresse">
            <button class="btn btn-primary" type="submit">Submit form</button>
        </div>
    </form>
</div>
</body>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>