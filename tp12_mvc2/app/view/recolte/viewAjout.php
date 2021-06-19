
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    ?>

    <form role="form" method='get' action='router2.php'>
        <div class="form-group">

            <input type="hidden" name='action' value="recolteCreated">

            <label for="id">Selectionnez un vin : </label> <select class="form-control" id='id' name='vin' style="width: 300px">
                <?php
                foreach ($resultsvin as $element) {
                    printf("<option value='{$element->getId()}'>%d : %s : %d</option>", $element->getId(), $element->getCru(), $element->getAnnee());
                }
                ?>
            </select>

            <label for="id">Slectionnez un producteur : </label> <select class="form-control" id='id' name='producteur' style="width: 300px">
                <?php
                foreach ($resultsprod as $element) {
                    printf("<option value='{$element->getId()}'>%d : %s : %s : %s</option>", $element->getId(), $element->getNom(), $element->getPrenom(), $element->getRegion());
                }
                ?>
            </select>

            <label for="id">Quantité : </label><br>
            <input name='quantite' value="20">

        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
</div>

<?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

