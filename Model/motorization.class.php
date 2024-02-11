<?php

use Symfony\Component\Intl\Scripts;

use function PHPSTORM_META\type;

	class Motorization
	{

		function __construct()
		{
		}

		//-----------------------------------------------------------------------

		private $id_motorization;
		public function getId()
		{
			return $this->id_motorization;
		}
		public function setId($new)
		{
			$this->id_motorization = $new;
		}

		//-----------------------------------------------------------------------

		private $name;
		public function getName()
		{
			return $this->name;
		}
		public function setName($new)
		{
			$this->name = $new;
		}

		//-----------------------------------------------------------------------

		private $theMotorization;
		public function getmotorization($îdMotorization)
		{
			include('../Controller/ConfigConnGp.php');

            //$_SESSION['timeZone']="Europe/Paris";
            date_default_timezone_set($_SESSION['timeZone']);
			//$labd = $_SESSION['db'];
			
			try
			{
			    $sql = $bdd->query("SELECT
										`motorization`.`id_motorization`,
										`motorization`.`name`

									FROM `motorization`
									
									WHERE `motorization`.`id_motorization`=$îdmotorization
								");

				/*while ($this->theContact[] = $sql->fetch());*/
				$this->theMotorization[] = $sql->fetch();
				return $this->theMotorization;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		private $motorizationList;
		public function get($whereClause, $orderBy = 'name', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 13)
		{
			include('../Controller/ConfigConnGp.php');
			
			try
			{
			    $sql = $bdd->query("SELECT
										`motorization`.`id_motorization`,
										`motorization`.`name`
									FROM
										`motorization`
									WHERE $whereClause
									ORDER BY $orderBy $ascOrDesc
									LIMIT $firstLine, $linePerPage
								");

				while ($this->motorizationList[] = $sql->fetch());
				return $this->motorizationList;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function addMotorization()
		{
			include('../Controller/ConfigConnGp.php');

			try{
				$bdd->exec("INSERT INTO `motorization`(`name`)
							VALUES('" . $this->name . "')");

				$sql = $bdd->query("SELECT MAX(`id_motorization`) FROM `motorization`");
				$id_motorization = $sql->fetch();
				$this->id_motorization = intval($id_motorization['id_motorization']);

				echo '<script>alert("L\'enregistrement est effectué!");</script>';

			} catch (Exception $e) {
				
				echo "Erreur de la requête : " . $e->getMessage();

			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function updatemotorization($idMotorization)
		{
			include('../Controller/ConfigConnGp.php');
			try
			{
				$bdd->exec("UPDATE `motorization` SET `name` = '" . $this->name . "'
							WHERE `id_motorization` = " . intval($idMotorization) . "
							");
				
				echo '<script>alert("Les modifications sont enregistrées!");</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function deleteMotorization($id)
		{
			include('../Controller/ConfigConnGp.php');

			try
			{
			    $bdd->exec('DELETE FROM motorization WHERE id_motorization=' . $id);
				echo '<script>alert("Cet enregistrement est supprimé!");</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

        //__Ajouter user?___________________________________________
        
        public function getAddmotorization()
        {
            if(is_null($_SESSION['addMotorization']))
            {
                $_SESSION['addMotorization']=false;
            }
            return $_SESSION['addMotorization'];
        }
        public function setAddmotorization($new)
        {
            $_SESSION['addMotorization']=$new;
        }

	}
	
?>