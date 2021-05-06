<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>TP04</title>
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="my_css.css">
</head>
<body>
	<div class="container">
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
			                $chaine= implode(', ', $_POST["modules"]);
			                echo $chaine;
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
			        <td>Question 5.1</td>
			        <td>En utilisant la methode GET on voit dans l'URL l'attribut name de chaque élément du formulaire, avec la methode POST on ne voit que l'URL de la localisation du fichier.</td>
			    </tr>
			    <tr>
			        <td>Question 5.2</td>
			        <td>La méthode POST peut être utilisée lorsqu'il y'a sur un formulaire contenant beaucoup de couples clé/valeur pour ne pas créer une URL trop longue  par exemple, elle peut  également être utilisée lorsqu'un utilisateur envoie des données confidentielles comme un mot de passe. Elle est à privilégier à la methode GET pour de la transmission d'informations entre un client et un serveur.</td>
			    </tr>
		    </tbody>
		</table>
	</div>

</body>
</html>