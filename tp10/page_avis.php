<?php
include "fragmenHeader.html";
require_once "fragmentDatabaseConfig.php";
require_once "bibliotheque.php";
echo "<div class='container'>";
try {
    $database = new PDO($dsn, $username, $password, $option);
} catch (PDOException $e) {
    printf("%s %s", $e->getCode(), $e->getMessage());
}

include "fragmentMenu.html";
include "fragmentJumbotron.html";
?>
<div class="container">
	<div class="panel panel-success">
		<div class="panel-heading">
			Exrecice 2 Question 1
		</div>
		<div class="panel-body">
			Cette façon de concevoir un site Web peut se réveler très pratique pour développer le plus rapidement possible. J'apprécie pouvoir utiliser les fragments comme des blocs que l'on ajoute à notre page.
		</div>
	</div>
	
	<div class="panel panel-success">
		<div class="panel-heading">
			Exrecice 2 Question 2
		</div>
		<div class="panel-body">
			Il existe de nombreux points positifs à utiliser les fragments en effet comme dit précédemment cela nous permet de développer bien plus rapidement car il suffit de réutiliser des fragments que l’on a écrit qu'une seule fois, ainsi si une modification est faite sur le fragment elle aura effet sur toutes les pages le contenant. De plus, l’utilisation des fragments peut également permettre d’utiliser moins de stockage car le code n’est écrit en réalité qu’une seule fois.
			Pour ce qui est des points négatifs l’utilisation de fragments empêche la personnalisation du  début et de la fin des pages, elles auront  toutes la même structure, pour des pages que l’on veut modifier

		</div>
	</div>

	<?php

    include "fragmentFooter.html";
	?>
	
</div>
</body>
</html>