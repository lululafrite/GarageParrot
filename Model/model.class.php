<?php

use Symfony\Component\Intl\Scripts;

use function PHPSTORM_META\type;

	class Model
	{

		function __construct()
		{
		}

		//-----------------------------------------------------------------------

		private $id_model;
		public function getId()
		{
			return $this->id_model;
		}
		public function setId($new)
		{
			$this->id_model = $new;
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

		private $theModel;
		public function getmodel($îdModel)
		{
			include('../Controller/ConfigConnGp.php');

            //$_SESSION['timeZone']="Europe/Paris";
            date_default_timezone_set($_SESSION['timeZone']);
			//$labd = $_SESSION['db'];
			
			try
			{
			    $sql = $bdd->query("SELECT
										`model`.`id_model`,
										`model`.`name`

									FROM `model`
									
									WHERE `model`.`id_model`=$îdmodel
								");

				/*while ($this->theContact[] = $sql->fetch());*/
				$this->theModel[] = $sql->fetch();
				return $this->theModel;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		private $modelList;
		public function get($whereClause, $orderBy = 'name', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 13)
		{
			include('../Controller/ConfigConnGp.php');
			
			try
			{
			    $sql = $bdd->query("SELECT
										`model`.`id_model`,
										`model`.`name`
									FROM
										`model`
									WHERE $whereClause
									ORDER BY $orderBy $ascOrDesc
									LIMIT $firstLine, $linePerPage
								");

				while ($this->modelList[] = $sql->fetch());
				return $this->modelList;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function addModel()
		{
			include('../Controller/ConfigConnGp.php');

			try{
				$bdd->exec("INSERT INTO `model`(`name`)
							VALUES('" . $this->name . "')");

				$sql = $bdd->query("SELECT MAX(`id_model`) FROM `model`");
				$id_model = $sql->fetch();
				$this->id_model = intval($id_model['id_model']);

				echo '<script>alert("L\'enregistrement est effectué!");</script>';

			} catch (Exception $e) {
				
				echo "Erreur de la requête : " . $e->getMessage();

			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function updatemodel($idModel)
		{
			include('../Controller/ConfigConnGp.php');
			try
			{
				$bdd->exec("UPDATE `model` SET `name` = '" . $this->name . "'
							WHERE `id_model` = " . intval($idModel) . "
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

		public function deleteModel($id)
		{
			include('../Controller/ConfigConnGp.php');

			try
			{
			    $bdd->exec('DELETE FROM model WHERE id_model=' . $id);
				echo '<script>alert("Cet enregistrement est supprimé!");</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

        //__Ajouter user?___________________________________________
        
        public function getAddmodel()
        {
            if(is_null($_SESSION['addModel']))
            {
                $_SESSION['addModel']=false;
            }
            return $_SESSION['addModel'];
        }
        public function setAddmodel($new)
        {
            $_SESSION['addModel']=$new;
        }

	}
	
?>