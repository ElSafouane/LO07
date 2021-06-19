<?php
require_once "WebBean.interface.php";

class Module  implements WebBean{
    private $sigle;
    private $label;
    private $categorie;
    private $effectif;



    public function getSigle()
    {
        return $this->sigle;
    }


    public function setSigle($sigle)
    {
        $this->sigle = $sigle;
    }


    public function getLabel()
    {
        return $this->label;
    }


    public function setLabel($label)
    {
        $this->label = $label;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    public function getEffectif()
    {
        return $this->effectif;
    }

    public function setEffectif($effectif)
    {
        $this->effectif = $effectif;
    }


    public function __construct($sigle, $label, $categorie, $effectif){
        $this->setSigle($sigle);
        $this->setLabel($label);
        $this->setCategorie($categorie);
        $this->setEffectif($effectif);

    }
    public function __toString()
    {
        return "Module ($this->sigle,$this->label,$this->categorie;$this->effectif)  <br>";
    }


    public function valide()
    {
        $resultat=TRUE;
        $sigle=filter_input(INPUT_GET, "sigle", FILTER_SANITIZE_STRING);
        $label=filter_input(INPUT_GET, "label", FILTER_SANITIZE_STRING);
        $categorie=filter_input(INPUT_GET, "categorie", FILTER_SANITIZE_STRING);
        $effectif=filter_input(INPUT_GET, "effectif", FILTER_SANITIZE_STRING);
        if (strlen($sigle)==0){
            $resultat=FALSE;
            $this->listeErreurs["sigle"]="Sigle n'est pas défini.";
        }
        if (strlen($label)==0){
            $resultat=FALSE;
            $this->listeErreurs["label"]="Label n'est pas défini.";
        }
        if (empty($categorie)){
            $resultat=FALSE;
            $this->listeErreurs["categorie"]="Categorie n'est pas défini.";
        }
        if (strlen($effectif)==0){
            $resultat=FALSE;
            $this->listeErreurs["effectif"]="Effectif n'est pas défini.";
        }
        return $resultat;

    }

    public function pageKO()
    {
        echo Charte::html_head_bootstrap("PageKO");
        echo "<h2>Votre formulaire n'est pas correct</h2>";
        foreach ($this->listeErreurs as $key=>$value) {
            echo ("$key=>$value <br>");
        }
        echo Charte::html_foot_bootstrap();
    }

    public function pageOK()
    {
        echo Charte::html_head_bootstrap("PageOK");
        echo "<h2>Votre  formulaire est correct</h2>";
        foreach ($_GET as $key =>  $value){
            echo "$key=> $value <br>";
        }
        echo Charte::html_foot_bootstrap();
    }

    public function sauveTXT()
    {
        echo "<h2>Sauve TXT</h2>";
        $resultat = $this->sigle . ";";
        $resultat .= $this-> label. ";";
        $resultat .= $this-> categorie. ";";
        $resultat .= $this-> effectif. ";";
        return $resultat;
    }

    public function sauveXML($file)
    {
        return "xml";
    }

    public function sauveBDR($table)
    {
        echo("<h2>SauveBDR</h2>");
        $resultat = "insert into " . $table . " values (";
        $resultat .="'". $this->sigle."', ";
        $resultat .="'".$this->label."', ";
        $resultat .="'".$this->categorie."', ";
        $resultat .="'".$this->effectif."')";
        return $resultat;
    }

    public function createTable($table)
    {
        echo "<h2>Create Table</h2>";
        $resultat="create table module <label> (sigle varchar(6) not null, categorie varchar(2) check categorie in ('CS', 'TM', 'EC', 'ME', 'CT'), label varchar(40) not null, effectif integer, primary key (sigle));";
        return $resultat;
    }

}



?>