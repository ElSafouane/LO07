<?php
session_start();

$_SESSION['nom_prenom'] = "EL MCHANTEF Safouane";
$modules=array("IF02", "PHYS11", "LO07", "GL01", "SC02", "LE17");
$_SESSION['module'] = $modules;
?>