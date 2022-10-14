<?php

require_once "Model.php";

class ModelCentre
{

    private $id, $label, $adresse;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $adresse = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->adresse = $adresse;
        }
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setLabel($label)
    {
        $this->label = $label;
    }

    function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }


    function getId()
    {
        return $this->id;
    }

    function getLabel()
    {
        return $this->label;
    }

    function getAdresse()
    {
        return $this->adresse;
    }


// retourne une liste de tous les centres
    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from centre";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($label, $adresse) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from centre";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into centre value (:id, :label, :adresse)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'adresse' => $adresse,
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }



    public static function update($label, $adresse) {
        try {

            $database = Model::getInstance();

            // update d'un nouveau tuple;
            $query = "select * from centre where label = :centre_label";
            $appartenance = $database->prepare($query);
            $appartenance->execute([
                'centre_label' => $label,
            ]);

            if ($appartenance->rowCount() > 0) {

                $query="update centre set adresse=:adresse where label= :centre_label ";
                $appartenance = $database->prepare($query);
                $appartenance->execute([
                    'centre_label'=>$label,
                    'adresse'=>$adresse,]);
                return 1;
            }
            else{
                return 0;
            }

        }

        catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
        return null;
    }
}
