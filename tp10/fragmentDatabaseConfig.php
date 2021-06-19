<?php

mysqli_connect("localhost", "el_mchas", "rHJ0YcSf", "el_mchas");
$dsn='mysql:dbname=el_mchas;host=localhost;charset=utf8';
$username='el_mchas';
$password='rHJ0YcSf';
$option= array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
$database= mysqli_connect("localhost", "el_mchas", "rHJ0YcSf", "el_mchas") or
die("Impossible de se connecter à MySQL"+ mysqli_connect_error());

?>