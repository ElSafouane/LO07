
<?php
require ($root . '/app/view/fragment/fragmentHeader.html');

?>

<body>
<div class="container">
<?php
include $root . '/app/view/fragment/fragmentMenu.html';
include $root . '/app/view/fragment/fragmentJumbotron.html';
?>
	<div id="maCarte"></div>



</div>
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
	        crossorigin=""></script>

<script>
	var carte = L.map('maCarte').setView([47 , 2], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        attribution: 'données <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom:1,
	    maxZoom: 20,
    }).addTo(carte);

    var marqueur = L.marker([51.5, -0.09]).addTo(mymap);

</script>

</body>
	<?php
    require ($root . '/app/view/fragment/fragmentFooter.html');

    ?>




