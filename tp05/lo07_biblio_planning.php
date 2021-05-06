<?php

function listeJourLabel(){
    return array("Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi","Dimanche");
}

function listeJourIndice()
{
    return range(1, 31);
}

function listeMois(){
    return array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
}

function listeSeance(){
    $horaires=array();
    $horaires[1]='8h00';
     foreach (range(8,17) as $heure){
        for ($min=0; $min<=4; $min=$min+2){
             $horaires[]=$heure.'h'.$min.'0';
        }
    }
     return $horaires;
}
?>