<?php

require_once "Model.php";

class ModelStock
{

    private $centre_id, $vaccin_id,$quantite;

    // pas possible d'avoir 2 constructeurs
    public function __construct($centre_id = NULL, $vaccin_id=NULL,$quantite = NULL)
    {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id)) {
            $this->centre_id = $centre_id;
            $this->vaccin_id = $vaccin_id;
            $this->quantite = $quantite;
        }
    }



    function getCentre_id()
    {
        return $this->centre_id;
    }

    function setCentre_id($centre_id)
    {
        $this->centre_id = $centre_id;
    }

    function getVaccin_id()
    {
        return $this->vaccin_id;
    }


    function setVaccin_id($vaccin_id)
    {
        $this->vaccin_id = $vaccin_id;
    }


    function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }


    function getQuantite()
    {
        return $this->quantite;
    }


// retourne une liste de tous les stocks
   public static function getSomme()
    {
        try {
            $database = Model::getInstance();
            $query = "select centre.label as Centre, sum(quantite) as Doses from stock, vaccin, centre where stock.centre_id = centre.id and stock.vaccin_id = vaccin.id group by centre.label order by sum(quantite) DESC";
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
    public static function getAllLabel()
    {
        try {
            $database = Model::getInstance();
            $query = "select centre.label as Centre, vaccin.label as Vaccin, quantite from stock, centre, vaccin where stock.centre_id = centre.id and stock.vaccin_id = vaccin.id";
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

    public static function insert($centre_id, $vaccin_id, $quantite) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(centre_id) from stock";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into stock value (:centre_id, :vaccin_id, :quantite)";
            $statement = $database->prepare($query);
            $statement->execute([
                'centre_id' => $centre_id,
                'vaccin_id'=>$vaccin_id,
                'quantite' => $quantite,
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function update($centre, $vaccin, $quantite) {
        try {
            $database = Model::getInstance();
            // update d'un nouveau tuple;
            $query = "select * from stock where centre_id = :centre and vaccin_id= :vaccin";
            $appartenance = $database->prepare($query);
            $appartenance->execute([
                'centre' => $centre,
                'vaccin'=>$vaccin,

            ]);
            $ajout = "select quantite from stock where centre_id = :centre and vaccin_id= :vaccin";
            $statement = $database->prepare($ajout);
            $statement->execute([
                'centre' => $centre,
                'vaccin'=>$vaccin,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_COLUMN);
            $add = $results[0];

            if ($appartenance->rowCount() > 0) {
                $query="update stock set quantite=:quantite where centre_id= :centre and vaccin_id= :vaccin ";
                $appartenance = $database->prepare($query);
                $appartenance->execute([
                    'centre'=>$centre,
                    'vaccin'=>$vaccin,
                    'quantite'=> $quantite+$add]);
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
