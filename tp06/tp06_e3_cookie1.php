<?php
$key = "nom";
$value = "EL MCHANTEF";
$cle = "prenom";
$valeur = "Safouane";
setcookie($key, $value);
setcookie($cle, $valeur);
print_r($_COOKIE);
echo '<br>';
echo '<br>';
echo "Lorsque l'on charge la page pour la première fois le navigateur n'enregistre pas les cookies, une fois la page rechargée, le navigateur nous reconnait et affiche les cookies enregistrés à la première connexion."
?>