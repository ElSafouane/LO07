
<!-- ----- debut ModelRdv -->

<?php
require_once 'Model.php';

class ModelRdv
{
	private $centre_id, $patient_id, $injection, $vaccin_id;

	// pas possible d'avoir 2 constructeurs
	public function __construct($centre_id = NULL, $patient_id = NULL, $injection = NULL, $vaccin_id = NULL)
	{
		// valeurs nulles si pas de passage de parametres
		if (!is_null($centre_id)) {
			$this->centre_id = $centre_id;
			$this->patient_id = $patient_id;
			$this->injection = $injection;
			$this->vaccin_id = $vaccin_id;
		}
	}

	function setCentreId($centre_id)
	{
		$this->centre_id = $centre_id;
	}

	function setPatientId($patient_id)
	{
		$this->patient_id = $patient_id;
	}

	function setInjection($injection)
	{
		$this->injection = $injection;
	}

	function setVaccinId($vaccin_id)
	{
		$this->vaccin_id = $vaccin_id;
	}

	function getCentreId()
	{
		return $this->centre_id;
	}

	function getPatientId()
	{
		return $this->patient_id;
	}

	function getInjection()
	{
		return $this->injection;
	}

	function getVaccinId()
	{
		return $this->vaccin_id;
	}


// retourne une liste des centre_id
	public static function getAllId()
	{
		try {
			$database = Model::getInstance();
			$query = "select centre_id from rendezvous";
			$statement = $database->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
			return $results;
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return NULL;
		}
	}

	public static function getIdpatient()
	{
		try {
			$database = Model::getInstance();
			$query = "select patient_id from rendezvous";
			$statement = $database->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
			return $results;
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return NULL;
		}

	}

	public static function getMany($query)
	{
		try {
			$database = Model::getInstance();
			$statement = $database->prepare($query);
			$statement->execute();
			$results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRdv");
			return $results;
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return NULL;
		}
	}

	public static function getAll($patient_id)
	{
		try {
			$database = Model::getInstance();
			$query = "select * from rendezvous where patient_id=:patient";
			$statement = $database->prepare($query);
			$statement->execute([
					'patient' => $patient_id,
			]);
			$results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRdv");
			return $results;
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return NULL;
		}
	}

	public static function getOne($centre_id)
	{
		try {
			$database = Model::getInstance();
			$query = "select * from rendezvous where centre_id = :centre_id";
			$statement = $database->prepare($query);
			$statement->execute([
					'centre_id' => $centre_id
			]);
			$results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRdv");
			return $results;
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return NULL;
		}
	}

	public static function insert($centre_id, $patient_id, $injection, $vaccin_id)
	{
		try {
			$database = Model::getInstance();
			//Update du stock
			$query = "update stock set quantite=quantite-1 where centre_id=:centre_id and vaccin_id=:vaccin_id";
			$appartenance = $database->prepare($query);
			$appartenance->execute([
					'centre_id' => $centre_id,
					'vaccin_id' => $vaccin_id,
			]);

			$query3 = "insert into rendezvous value ( :centre_id, :patient_id, :injection, :vaccin_id)";
			$statement = $database->prepare($query3);
			$statement->execute([
					'vaccin_id' => intval($vaccin_id),
					'patient_id' => intval($patient_id),
					'centre_id' => intval($centre_id),
					'injection' => intval($injection)
			]);
			return 1;
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}
	}

	public static function checkDosesCentre()
	{
		try {
			$database = Model::getInstance();

			// ajout d'un nouveau tuple;
			$query = "select distinct label, id, quantite from centre, stock where (quantite>0 and centre.id=stock.centre_id) group by label order by id";
			$statement = $database->prepare($query);
			$statement->execute();
			$dosesDispo = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
			return $dosesDispo;
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}
	}


	public static function check($patient_id)
	{
		try {

			$database = Model::getInstance();

			$query = "select max(injection) from rendezvous where patient_id=:patient";
			$statement = $database->prepare($query);
			$statement->execute([
					'patient' => $patient_id,
			]);

			if ($statement->rowCount() > 0) {
				$dose = $statement->fetch();
				return $dose[0];
			} else {
				return 0;
			}
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}

	}

	public static function maxdoses($centre_id)
	{
		try {
			$database = Model::getInstance();

			$query = "SELECT DISTINCT centre_id, vaccin.label, vaccin_id, quantite from stock, vaccin, centre where (quantite=(SELECT max(quantite) FROM stock WHERE centre_id=:centre) and vaccin_id=vaccin.id and centre_id=:centre)";
			$statement = $database->prepare($query);
			$statement->execute([
					'centre' => $centre_id,
			]);


			$query2 = "select vaccin_id from stock where quantite= (select max(quantite) FROM stock where centre_id=:centre) AND centre_id=:centre";
			$statement1 = $database->prepare($query2);
			$statement1->execute([
					'centre' => $centre_id,
			]);
			$vaccin_id = $statement1->fetch();
			echo $vaccin_id[0];
			echo "C'est vaccin ID 0";
			return $vaccin_id[0];

		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}
	}

	public static function injection($patient_id)
	{
		try {
			$database = Model::getInstance();
			$query = "select max(injection) from rendezvous where patient_id=:patient";
			$injection = $database->prepare($query);
			$injection->execute([
					'patient' => $patient_id,
			]);
			$injection = $injection->fetch();
			return $injection[0];
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}
	}


	public static function update($patient_id, $vaccin_id, $injection, $centre_id)
	{
		try {
			$database = Model::getInstance();
			// update d'un nouveau tuple;
			$query = "select * from rendezvous where patient_id =:patient";
			$appartenance = $database->prepare($query);
			$appartenance->execute([
					'patient' => $patient_id,
			]);
			if ($appartenance->rowCount() > 0) {

				echo "Je suis dans le if de correspondance";

				$query = "insert into rendezvous value (:centre, :patient, :injection, :vaccin)";
				echo "Salut1";
				$appartenance = $database->prepare($query);
				echo "Salut2";
				$appartenance->execute([
						'centre' => $centre_id,
						'patient' => $patient_id,
						'injection' => $injection,
						'vaccin' => $vaccin_id,
				]);
				echo "Salut3";
				$query = "update stock set quantite=quantite-1 where centre_id=:centre_id and vaccin_id=:vaccin_id";
				$appartenance = $database->prepare($query);
				$appartenance->execute([
						'centre_id' => $centre_id,
						'vaccin_id' => $vaccin_id,
				]);
				return 1;
			} else {
				return 0;
			}

		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}
	}


	public static function getDoses($patient_id)
	{
		try {
			$database = Model::getInstance();

			$query = "select doses from vaccin, rendezvous, patient where vaccin.id = vaccin_id and patient.id=:patient and patient.id=patient_id";
			$statement = $database->prepare($query);
			$statement->execute([
					'patient' => $patient_id,
			]);
			$doses = $statement->fetch();
			return $doses[0];
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}
	}

	public static function getVaccin($patient_id)
	{
		try {
			$database = Model::getInstance();

			// ajout d'un nouveau tuple;
			$query = "select distinct vaccin_id from rendezvous WHERE patient_id=:patient ";
			$statement = $database->prepare($query);
			$statement->execute([
					'patient' => $patient_id,
			]);
			$dosesDispo = $statement->fetch();
			return $dosesDispo[0];
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}
	}


	public static function getCentre($vaccin_id)
	{
		try {
			$database = Model::getInstance();

			// ajout d'un nouveau tuple;
			$query = "select DISTINCT centre.id, centre.label from centre, stock, rendezvous WHERE centre.id=stock.centre_id and stock.vaccin_id=rendezvous.vaccin_id and rendezvous.vaccin_id=:vaccin and quantite!=0";
			$statement = $database->prepare($query);
			$statement->execute([
					'vaccin' => $vaccin_id,
			]);
			$dosesDispo = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCentre");
			if ($statement->rowCount() > 0) {
				return $dosesDispo;
			} else {
				return 0;
			}

		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}

	}

	public static function getResults($patient_id, $centre_id)
	{
		try {
			$database = Model::getInstance();
			$query = "select centre_id, vaccin_id from rendezvous where patient_id=:patient and centre_id=:centre";
			$results = $database->prepare($query);
			$results->execute([
					'patient' => $patient_id,
					'centre' => $centre_id,
			]);
			$results = $results->fetchAll(PDO::FETCH_CLASS, "ModelRdv");
			return $results;
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}

	}

	public static function innov1()
	{
		try {
            $database = Model::getInstance();
            $query = "SELECT label, COUNT(DISTINCT patient_id) as Patients FROM vaccin,rendezvous WHERE rendezvous.vaccin_id = vaccin.id GROUP BY label";
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

	public static function updateInnov($patient_id, $nom, $prenom, $adresse)
	{
		try {
			$database = Model::getInstance();
			// update d'un nouveau tuple;
			$query = "update patient set nom=:nom, prenom=:prenom, adresse=:adresse where id=:id";
			$appartenance = $database->prepare($query);
			$appartenance->execute([
					'id'=>$patient_id,
					'nom' => $nom,
					'prenom' => $prenom,
					'adresse' => $adresse,
			]);

            return 1;
		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}
	}
	public static function getPatientNonVacc(){
		try {
			$database = Model::getInstance();
			// update d'un nouveau tuple;
			$query = "SELECT DISTINCT patient.id, nom, prenom, adresse FROM patient LEFT OUTER JOIN rendezvous ON rendezvous.patient_id=patient.id WHERE rendezvous.patient_id IS NULL ";
			$appartenance = $database->prepare($query);
			$appartenance->execute();
			$cols=array();
			for ($i=0; $i < $appartenance->ColumnCount(); $i++){
				$cols[$i]=$appartenance->getColumnMeta($i)['name'];
			}
			$data=$appartenance->fetchAll(PDO::FETCH_ASSOC);

			return array($cols,$data);

		} catch (PDOException $e) {
			printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
			return -1;
		}
	}
}
?>
<!-- ----- fin ModelRdv -->
