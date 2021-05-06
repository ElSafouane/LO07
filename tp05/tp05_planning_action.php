<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>TP05</title>
    <link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="my_css.css">

</head>
<body>
<div class="container">
    <?php
    function cartouche($name){
        $panel = "<div class='panel panel-danger'>";
        $panel .="    <div class='panel-heading'>";
        $panel .="      <h3 class='panel-title'>SuperGlobale".$name." </h3> ";
        $panel .="</div>";
        $panel .="</div>";
        return $panel;
    }

    $supglob=array("GET"=> $_GET, "POST" => $_POST);

    foreach ($supglob as $label=> $glob) {
        if ($glob){
            echo cartouche($label);
            echo "<table class='table table-striped table-bordered'>";
            echo "<thead>";
            echo "<tr><th scope='col'>name</th><th scope='col'>valeurs(s)</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($glob as $cle=>$valeur){
                if (is_array($valeur)){
                    $liste = implode(", ",$valeur);
                    echo "<tr><td>$cle</td><td>$liste</td></tr>";
                }
                else{
                    echo "<tr><td>$cle</td><td>$valeur</td></tr>";
                }
            }
            echo "</tbody>";
            echo "</table>";

        }
    }
    ?>
</div>
</body>
</html>