<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>TP04</title>
    <link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="my_css.css">
</head>
    <body>
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
                            $chaine= implode(', ', $_GET["modules"]);
                            echo $chaine;
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
        <div class="panel panel-info">
	        <div class="panel-heading">
		        Mes réponses aux questions ...
	        </div>
	        <div class="panel-body">
				Liste des questions de  la section 2.7
	        </div>
        </div>
        <table class="table-bordered table-striped table">
	        <thead>
	        <tr>
		        <th scope="col">Questions</th>
		        <th scope="col">Réponses</th>
	        </tr>
	        </thead>
	        <tbody>
				<tr>
					<td>Question 7.1</td>
					<td>Si un element du formulaire n'est pas rempli on voit afficher dans l'URL un " 'name'=&". De plus la case associé sur le tableau php apparait vide.</td>
				</tr>
				<tr>
					<td>Question 7.2</td>
					<td>On doit rajouter les crochets [] après le nom de notre attribut name</td>
				</tr>
				<tr>
					<td>Question 7.3</td>
					<td>Les valeurs sont récuperées depuis la page HTML en utilisant la superglobale $_GET associé à l'attribut name</td>
				</tr>
				<tr>
					<td>Question 7.4</td>
					<td>On peut modifier les valeurs envoyées à notre script PHP en modifiant la valeur située après le nom de l'attribut: par exemple "http://localhost:63342/lo07_tp/tp04/tp04_inscription_get_action.php?nom=Musk&prenom=Elon&mail=&date=&radio=Homme&etudes=TC&modules%5B%5D=GL02&InfoComp=" nous donne le formualire avec pour nom ELon MUSK mais si l'on ecrit "http://localhost:63342/lo07_tp/tp04/tp04_inscription_get_action.php?nom=Musk&prenom=Safouane&mail=&date=&radio=Homme&etudes=TC&modules%5B%5D=GL02&InfoComp=" on aura ici le formulaire de Safouane MUSK. </td>
				</tr>
				<tr>
					<td>Question 7.5</td>
					<td>Si un élément du formulaire ne dispose  pas d'attribut name, on obtient l'erreur "Undefined index"</td>
				</tr>
	        </tbody>
    </body>
</html>