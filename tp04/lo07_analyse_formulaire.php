<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>PHP Formulaire final</title>
    <link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="my_css.css">

</head>
    <body>
    <?php if ($_SERVER["REQUEST_METHOD"]==="GET"):?>
        <div class="container">
            <div class="panel panel-danger">
                <div class="panel-heading">
	                SuperGlobale GET
                </div>
            </div>

	        <div class="panel-body">
	            <table class="table-bordered table-striped table">
	                <thead>
	                <tr>
	                    <th scope="col">Name</th>
	                    <th scope="col">Valeur(s)</th>
	                </tr>
	                </thead>
	                <tbody>
	                <tr>
	                    <td>Nom</td>
	                    <td><?php
	                        echo $_GET["nom"];?></td>
	                </tr>
	                <tr>
	                    <td>Prénom</td>
	                    <td><?php
	                        echo $_GET["prenom"];?></td>
	                </tr>
	                <tr>
	                    <td>Mail</td>
	                    <td><?php
	                        echo $_GET["mail"];?></td>
	                </tr>
	                <tr>
	                    <td>Date de naissance</td>
	                    <td><?php
	                        echo $_GET["date"];?></td>
	                </tr>
	                <tr>
	                    <td>Sexe</td>
	                    <td><?php
	                        echo $_GET["radio"];?></td>
	                </tr>
	                <tr>
	                    <td>Origine des étudiants</td>
	                    <td><?php
	                        echo $_GET["etudes"];?></td>
	                </tr>
	                <tr>
	                    <td>ST07</td>
	                    <td>
	                        <?php if (isset($_GET["ST07"])) echo "Oui";
	                        else
	                            echo "Non";?>
	                    </td>
	                <tr>
	                    <td>ST09</td>
	                    <td><?php if (isset($_GET["ST09"])) echo "Oui";
	                        else
	                            echo "Non";?></td>
	                </tr>
	                <tr>
	                    <td>ST10</td>
	                    <td> <?php if (isset($_GET["ST10"])) echo "Oui";
	                        else
	                            echo "Non";?></td>
	                </tr>
	                <tr>
	                    <td>SE</td>
	                    <td> <?php if (isset($_GET["SE"])) echo "Oui";
	                        else
	                            echo "Non";?></td>
	                </tr>
	                <tr>
	                    <td>Modules</td>
	                    <td><?php
	                        if (isset($_GET["modules"])){
                                $modules = $_GET["modules"];
                                foreach ($modules as $module) {
									echo $module.', ';
	                            };
	                        };
	                        ?>
	                    </td>
	                </tr>
	                <tr>
	                    <td>Informations Complémentaires</td>
	                    <td><?php
	                        echo $_GET["InfoComp"];?></td>
	                </tr>
	                </tbody>
	            </table>
	        </div>

	        <?php endif;?>



	        <?php if ($_SERVER["REQUEST_METHOD"]==="POST"):?>

	        <div class="panel panel-danger">
		        <div class="panel-heading">
			        SuperGlobale POST
		        </div>
	        </div>
	        <div class="panel-body">
	        <table class="table-bordered table-striped table">
		        <thead>
		        <tr>
			        <th scope="col">Name</th>
			        <th scope="col">Valeur(s)</th>
		        </tr>
		        </thead>
		        <tbody>
		        <tr>
			        <td>Nom</td>
			        <td><?php
                        echo $_POST["nom"];?></td>
		        </tr>
		        <tr>
			        <td>Prénom</td>
			        <td><?php
                        echo $_POST["prenom"];?></td>
		        </tr>
		        <tr>
			        <td>Mail</td>
			        <td><?php
                        echo $_POST["mail"];?></td>
		        </tr>
		        <tr>
			        <td>Date de naissance</td>
			        <td><?php
                        echo $_POST["date"];?></td>
		        </tr>
		        <tr>
			        <td>Sexe</td>
			        <td><?php
                        echo $_POST["radio"];?></td>
		        </tr>
		        <tr>
			        <td>Origine des étudiants</td>
			        <td><?php
                        echo $_POST["etudes"];?></td>
		        </tr>
		        <tr>
			        <td>ST07</td>
			        <td>
                        <?php if (isset($_POST["ST07"])) echo "Oui";
                        else
                            echo "Non";?>
			        </td>
		        <tr>
			        <td>ST09</td>
			        <td><?php if (isset($_POST["ST09"])) echo "Oui";
                        else
                            echo "Non";?></td>
		        </tr>
		        <tr>
			        <td>ST10</td>
			        <td> <?php if (isset($_POST["ST10"])) echo "Oui";
                        else
                            echo "Non";?></td>
		        </tr>
		        <tr>
			        <td>SE</td>
			        <td> <?php if (isset($_POST["SE"])) echo "Oui";
                        else
                            echo "Non";?></td>
		        </tr>
		        <tr>
			        <td>Modules</td>
			        <td><?php
                        if (isset($_POST["modules"])){
                            $modules = $_POST["modules"];
                            foreach ($modules as $module) {
                                echo $module.", ";
                            };
                        };
                        ?>
			        </td>
		        </tr>
		        <tr>
			        <td>Informations Complémentaires</td>
			        <td><?php
                        echo $_POST["InfoComp"];?></td>
		        </tr>
		        </tbody>
	        </table>
	        </div>
	        <?php endif ;?>
        </div>
    </body>
</html>