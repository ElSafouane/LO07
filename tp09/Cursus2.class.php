<?php

require_once "Charte.class.php";
require_once "Module.class.php";

session_start();

class Cursus2
{
    private $listeModules;


    public function __construct()
    {
        if (isset($_SESSION["SESSION_cursus"])){
            $this->listeModules=$_SESSION["SESSION_cursus"];
        }
    }

    public function addModule(Module $module)
    {
        $this->listeModules[$module->getSigle()] = $module;
        $_SESSION['SESSION_cursus'] = $this->listeModules;
    }

    public function __toString()
    {
        return ("Module(" . $this->$_GET["sigle"] . ", " . $this->$_GET["label"] . ", " . $this->$_GET["categorie"] . ", " . $this->$_GET["effectif"] . ")");
    }


    public function affiche()
    {
        echo "<h2>Affichage d'un cursus</h2>";
        echo "<pre>";
        print_r($this);
        echo "</pre>";
    }
}


