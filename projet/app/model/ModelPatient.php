<?php

require_once "Model.php";

class ModelPatient
{

    private $id, $nom, $prenom,$adresse;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $nom = NULL, $prenom=NULL,$adresse = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->adresse = $adresse;
        }
    }

    function getNom()
    {
        return $this->nom;
    }

    function setNom($nom)
    {
        $this->nom = $nom;
    }

    function getPrenom()
    {
        return $this->prenom;
    }


    function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }


    function getId()
    {
        return $this->id;
    }


    function getAdresse()
    {
        return $this->adresse;
    }


// retourne une liste de tous les patients
    public static function getAll()
    {
        try {
            $database = Model::getInstance();
            $query = "select * from patient";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPatient");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($nom, $prenom, $adresse) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from patient";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into patient value (:id, :nom, :prenom, :adresse)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom'=>$prenom,
                'adresse' => $adresse,
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function update($nom, $prenom, $adresse) {
        try {

            $database = Model::getInstance();

            // update d'un nouveau tuple;
            $query = "select * from patient where nom = :patient_nom and prenom= :patient_prenom";
            $appartenance = $database->prepare($query);
            $appartenance->execute([
                'patient_nom' => $nom,
                'patient_prenom'=>$prenom,

            ]);

            if ($appartenance->rowCount() > 0) {

                $query="update patient set adresse=:adresse where nom= :patient_nom and prenom= :patient_prenom ";
                $appartenance = $database->prepare($query);
                $appartenance->execute([
                    'patient_nom'=>$nom,
                    'patient_prenom'=>$prenom,
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
