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
            <input type="hidden" name='action' value='innovationUpdated'>
            <label for="id">Nom : </label><br>
            <input type="text" name="nom" placeholder="Nom">
	        <br><br>
	        <label for="id">Prénom : </label><br>
            <input type="text" name="prenom" placeholder="Prénom">
	        <br><br>
	        <label for="id">Adresse : </label><br>
            <input type="text" name="adresse" placeholder="Adresse">
            <input type="hidden" name="patient" value="<?php echo $patient_id; ?>">

        </div>
        <p/>
        <button class="btn btn-primary" type="submit">Submit Form</button>
    </form>
    <p/>
</div>
<?php include $root . '/app/view/fragment/fragmentFooter.html'; ?>

<!-- ----- fin viewInsert -->

