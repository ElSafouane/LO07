<?php
require_once "Charte.class.php";
require_once "Module.class.php";
class Cursus
{
    private $listeModules;



    public function __construct()
    {
        $this->listeModules=array("");
    }

    public function addModule(Module $module){
        $this->listeModules[$module->getSigle()] = $module;
        echo "addmodule: Module (".$module->getSigle().", ".$module->getLabel().", ".$module->getCategorie().", ".$module->getEffectif().")<br>";
    }

    public function __toString(){
        return ("Module(".$this->$_GET["sigle"].", ". $this->$_GET["label"].", ". $this->$_GET["categorie"].", ". $this->$_GET["effectif"].")");
    }


    public function affiche(){
        echo "<h2>Affichage d'un cursus</h2>";
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }
}


?>