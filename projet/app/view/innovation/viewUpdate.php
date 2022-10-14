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
            <input type="hidden" name='action' value='innovationUpdate'>
            <label for="id">Selectionnez le patient à mettre à jour : </label><select class="form-control" id="id" name="patient" style="width: 200px;">';
                <?php foreach ($patient as $label) {
                printf("<option value='{$label->getId()}'>%d : %s : %s</option>", $label->getId(), $label->getNom(), $label->getPrenom());
                }
                echo "</select>";
            echo "<br>";
            ?>

        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Submit Form</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->

