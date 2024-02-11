<?php

use Symfony\Component\Intl\Scripts;

use function PHPSTORM_META\type;

	class Brand
	{

		function __construct()
		{
		}

		//-----------------------------------------------------------------------

		private $id_brand;
		public function getId()
		{
			return $this->id_brand;
		}
		public function setId($new)
		{
			$this->id_brand = $new;
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

		private $theBrand;
		public function getBrand($îdBrand)
		{
			include('../Controller/ConfigConnGP.php');

            //$_SESSION['timeZone']="Europe/Paris";
            date_default_timezone_set($_SESSION['timeZone']);
			//$labd = $_SESSION['db'];
			
			try
			{
			    $sql = $bdd->query("SELECT
										`brand`.`id_brand`,
										`brand`.`name`

									FROM `brand`
									
									WHERE `brand`.`id_brand`=$îdBrand
								");

				/*while ($this->theContact[] = $sql->fetch());*/
				$this->theBrand[] = $sql->fetch();
				return $this->theBrand;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		private $brandList;
		public function get($whereClause, $orderBy = 'name', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 13)
		{
			include('../Controller/ConfigConnGP.php');
			
			try
			{
			    $sql = $bdd->query("SELECT
										`brand`.`id_brand`,
										`brand`.`name`
									FROM
										`brand`
									WHERE $whereClause
									ORDER BY $orderBy $ascOrDesc
									LIMIT $firstLine, $linePerPage
								");

				while ($this->brandList[] = $sql->fetch());
				return $this->brandList;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function addBrand()
		{
			include('../Controller/ConfigConnGP.php');

			try{
				$bdd->exec("INSERT INTO `brand`(`name`)
							VALUES('" . $this->name . "')");

				$sql = $bdd->query("SELECT MAX(`id_brand`) FROM `brand`");
				$id_brand = $sql->fetch();
				$this->id_brand = intval($id_brand['id_brand']);

				echo '<script>alert("L\'enregistrement est effectué!");</script>';

			} catch (Exception $e) {
				
				echo "Erreur de la requête : " . $e->getMessage();

			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function updateBrand($idBrand)
		{
			include('../Controller/ConfigConnGP.php');
			try
			{
				$bdd->exec("UPDATE `brand` SET `name` = '" . $this->name . "'
							WHERE `id_brand` = " . intval($idBrand) . "
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

		public function deleteBrand($id)
		{
			include('../Controller/ConfigConnGP.php');

			try
			{
			    $bdd->exec('DELETE FROM brand WHERE id_brand=' . $id);
				echo '<script>alert("Cet enregistrement est supprimé!");</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

        //__Ajouter user?___________________________________________
        
        public function getAddBrand()
        {
            if(is_null($_SESSION['addBrand']))
            {
                $_SESSION['addBrand']=false;
            }
            return $_SESSION['addBrand'];
        }
        public function setAddBrand($new)
        {
            $_SESSION['addBrand']=$new;
        }

	}
	
?>