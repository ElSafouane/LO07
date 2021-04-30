<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TP03</title>
    <link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="tp03_css.css">
</head>
<body>
    <div class="container">
	    <nav class="navbar navbar-fixed-top navbar-inverse">
		    <div class="navbar-header">
			    <a href="#" class="navbar-brand">Web 03</a>
		    </div>
		    <ul class="nav navbar-nav">
			    <li class="active"><a href="#ex1">Exercice 1</a></li>
			    <li class="active"><a href="#ex2">Exercice 2</a></li>
			    <li class="active"><a href="#ex3">Exercice 3</a></li>
			    <li class="active"><a href="#ex4">Exercice 4</a></li>
			    <li class="active"><a href="#ex5">Exercice 5</a></li>
		    </ul>
	    </nav>
        <div class="panel panel-success">
            <div id="ex1" class="panel-heading">
                Exercice 1: validation de la configuration div-isi
            </div>
                <div class="panel-body">
                    <?php
                        echo  "Bonjour à tous";
                        $nom='Durand';
                        $prenom='Pascal';
                        $age='32';
                        $ingenieur=FALSE;
                    ?>
                </div>
<!-- Question 7:
    http://localhost:63342/lo07_tp/tp03/tp03_intro_php.php?_ijt=f0o8jscp87874mfghk36j4nk6l-->
        </div>
        <div class="panel panel-primary">
            <div id="ex2" class="panel-heading">
                Exercice 2
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">Nom: <?php echo $nom; ?></li>
                    <li class="list-group-item">Prénom: <?php echo $prenom; ?></li>
                    <li class="list-group-item">Age: <?php echo $age; ?></li>
                    <li class="list-group-item">Ingenieur: <?php echo $ingenieur; ?></li>
                </ul>
            </div>
        </div>

        <!--Exercice 2
         Question 3
         Les instructions PHP ne sont pas visible sur le navigateur-->
        <div class="panel panel-success">
            <div id="ex3" class="panel-heading">
                Exercice 3 : Tableau des capitales d'Afrique
            </div>
            <div class="panel-body">
                    <?php
                        $capitalesAfrique=array("Alger","Bamako","Conakry","Cotonou","Freetown","Kampala","Lomé","Nairobi","Yamoussoukro");
                        $capitalesAfrique[10]="Maputo";
                        unset($capitalesAfrique[4]);
                    ?>
                <h2>print_r</h2>
                <pre>

                    <?php print_r($capitalesAfrique)?>
                </pre>
                    <h2>Foreach</h2>
                    <?php
                    echo '<ul class="list-group">';
                    foreach ($capitalesAfrique as $villes){
                        echo "<li class='list-group-item'>".$villes."</li>";
                    }
                    echo '</ul>'?>
                <h2>Implode</h2>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <?php
                        $chaine= implode('; ', $capitalesAfrique);
                        echo ($chaine);?>
                    </div>
                </div>
                <h2>Accès aux données</h2>
                <div class="panel panel-danger">
                    <div class="panel-body">
                        <?php
                        $taille= count($capitalesAfrique);
                        echo "Nombre d'éléments = ".$taille;

                        ?>
                    </div>
                    <div class="panel-heading">
                        <?php
                        sort($capitalesAfrique);
                        $tri=implode(', ', $capitalesAfrique);
                        echo "Tableau trié = ".$tri;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div id="ex4" class="panel panel-primary">
            <div class="panel-heading">
                Exercice 4
            </div>
            <div class="panel-body">
                <?php $capitalesEurope=array("France"=> "Paris", "Italie"=> "Rome", "Belgique"=> "Bruxelles", "Espagne" =>"Madrid", "Allemagne"=>
"Berlin", "Portugal"=> "Lisbonne", "France"=>"Troyes");
                ?>



		        <div class="panel panel-warning">
		            <div class="panel-heading">
		                Capitale de l'Allemagne
		            </div>
		            <div class="panel-body">
		                <?php echo "Capitale de l'Allemagne: ".$capitalesEurope["Allemagne"].'<br>';
		                echo '<pre>';
		                foreach ($capitalesEurope as $capEU=> $value){
		                    echo $capEU.' => '.$value.'<br>';
		                };

		                print_r(array_keys($capitalesEurope));
		                print_r(array_values($capitalesEurope));
		                echo '</pre>';'<br>';
		                ?>
		            </div>
		        </div>
            </div>
        </div>
        <!--Si l'on ajoute le couple (France, Troyes) la valeur "Paris" est ecrasée par "Troyes"-->
        <div class="panel panel-success">
            <div id="ex5" class="panel-heading">
                Exercice 5 : fonctions
            </div>
            <div class="panel-body">
                <?php
                function badge_danger($label, $compteur){
                	echo '<button class="btn btn-danger">'.$label.' '.'<span class="badge">'.$compteur.'</span>'.'</button> ';
                };
                badge_danger('Web ',6);
                echo '<br>';
                foreach ($capitalesAfrique as $value) {
                	$lettres=strlen ($value);
                	badge_danger($value, $lettres);
                }?>
            </div>
        </div>



    </div>





</body>
</html>
