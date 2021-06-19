<?php

require_once 'Model.php';

class ModelRecolte {
    private $id, $nom, $prenom, $region;

    // pas possible d'avoir 2 constructeurs
    public function __construct($producteur_id = NULL, $vin_id = NULL, $quantite = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($producteur_id)) {
            $this->setProdId($producteur_id);
            $this->setVinId($vin_id);
            $this->setQuantite($quantite);
        }
    }

    function setProdId($prod_id) {
        $this->producteur_id = $prod_id;
    }

    function setVinId($vin_id) {
        $this->vin_id = $vin_id;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }


    function getProdId() {
        return $this->producteur_id;
    }

    function getVinId() {
        return $this->vin_id;
    }

    function getQuantite() {
        return $this->quantite;
    }


/* retourne une liste des id
    public static function getAllId() {
        try {
            $database = Model::getInstance();
            $query = "select id from recolte";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getMany($query) {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }*/

    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from recolte";
            $statement = $database->prepare($query);
            $statement->execute();


            $cols=array();
            for ($i=0; $i < $statement->ColumnCount(); $i++){
                $cols[$i]=$statement->getColumnMeta($i)['name'];
            }
            $data=$statement->fetchAll(PDO::FETCH_ASSOC);

            return array($cols,$data);

        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getOne($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from recolte where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function insert($producteur, $vin, $quantite) {
        try {
            $database = Model::getInstance();

            // ajout d'un nouveau tuple;
            $query = "insert into recolte value (:producteur_id, :vin_id, :quantite)";
            $statement = $database->prepare($query);
            $statement->execute([
                'producteur_id' => $producteur,
                'vin_id' => $vin,
                'quantite' => $quantite,
            ]);
            return $producteur;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }





    public static function update($producteur, $vin, $quantite) {
        try {
            $database = Model::getInstance();

            // update d'un nouveau tuple;
            $query = "select * from recolte where producteur_id  = :producteur and vin_id = :vin";
            $appartenance = $database->prepare($query);
            $appartenance->execute([
                'producteur' => $producteur,
                'vin' => $vin
            ]);

            if ($appartenance->rowCount() > 0) {

                $query="update recolte set quantite=:quantite where producteur_id= :producteur_id and vin_id= :vin_id";
                $appartenance = $database->prepare($query);
                $appartenance->execute([
                    'producteur_id'=>$producteur,
                    'vin_id'=>$vin,
                    'quantite'=>$quantite,]);
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
?>