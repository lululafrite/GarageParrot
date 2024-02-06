<?php

use Symfony\Component\Intl\Scripts;

use function PHPSTORM_META\type;

	class Car
	{

		function __construct()
		{
		}

		//-----------------------------------------------------------------------

		private $id_car;
		public function getId()
		{
			return $this->id_car;
		}
		public function setId($new)
		{
			$this->id_car = $new;
		}

		//-----------------------------------------------------------------------

		private $brand;
		public function getBrand()
		{
			return $this->brand;
		}
		public function setBrand($new)
		{
			$this->brand = $new;
		}

		//-----------------------------------------------------------------------

		private $model;
		public function getModel()
		{
			return $this->model;
		}
		public function setModel($new)
		{
			$this->model = $new;
		}

		//-----------------------------------------------------------------------

		private $motorization;
		public function getMotorization()
		{
			return $this->motorization;
		}
		public function setMotorization($new)
		{
			$this->motorization = $new;
		}

		//-----------------------------------------------------------------------

		private $year;
		public function getYear()
		{
			return $this->year;
		}
		public function setYear($new)
		{
			$this->year = $new;
		}

		//-----------------------------------------------------------------------

		private $mileage;
		public function getMileage()
		{
			return $this->mileage;
		}
		public function setMileage($new)
		{
			$this->mileage = $new;
		}

		//-----------------------------------------------------------------------

		private $price;
		public function getPrice()
		{
			return $this->price;
		}
		public function setPrice($new)
		{
			$this->price = $new;
		}

		//-----------------------------------------------------------------------

		private $sold;
		public function getSold()
		{
			return $this->sold;
		}
		public function setSold($new)
		{
			$this->sold = $new;
		}

		//-----------------------------------------------------------------------

		private $image1;
		public function getImage1()
		{
			return $this->image1;
		}
		public function setImage1($new)
		{
			$this->image1 = $new;
		}

		//-----------------------------------------------------------------------

		private $image2;
		public function getImage2()
		{
			return $this->image2;
		}
		public function setImage2($new)
		{
			$this->image2 = $new;
		}

		//-----------------------------------------------------------------------

		private $image3;
		public function getImage3()
		{
			return $this->image3;
		}
		public function setImage3($new)
		{
			$this->image3 = $new;
		}

		//-----------------------------------------------------------------------

		private $image4;
		public function getImage4()
		{
			return $this->image4;
		}
		public function setImage4($new)
		{
			$this->image4 = $new;
		}

		//-----------------------------------------------------------------------

		private $image5;
		public function getImage5()
		{
			return $this->image5;
		}
		public function setImage5($new)
		{
			$this->image5 = $new;
		}

		//-----------------------------------------------------------------------

		private $newCar;
		public function getNewCar()
		{
			if(empty($_SESSION['newCar'])){
				$_SESSION['newCar'] = false;
				$this->newCar = false;
			}
			return $_SESSION['newCar'];
		}
		public function setNewCar($new)
		{
			$_SESSION['newCar'] = $new;
			$this->newCar = $new;
		}

		//-----------------------------------------------------------------------

		private $theCar;
		public function getCar($îdCar)
		{
			include("../Controller/ConfigConnGp.php");

            $_SESSION['timeZone']="Europe/Paris";
            date_default_timezone_set($_SESSION['timeZone']);
			//$labd = $_SESSION['db'];
			
			try
			{
			    $sql = $bdd->query("SELECT
										`car`.`id_car`,
										`brand`.`name` AS `brand`,
										`model`.`name` AS `model`,
										`motorization`.`name` AS `motorization`,
										`car`.`year`,
										`car`.`mileage`,
										`car`.`price`,
										`car`.`sold`,
										`car`.`image1`,
										`car`.`image2`,
										`car`.`image3`,
										`car`.`image4`,
										`car`.`image5`

									FROM `car`

									LEFT JOIN `brand`
										ON `car`.`id_brand` = `brand`.`id_brand`
									LEFT JOIN `model`
										ON `car`.`id_model` = `model`.`id_model`
									LEFT JOIN `motorization`
										ON `car`.`id_motorization` = `motorization`.`id_motorization`
									
									WHERE `car`.`id_car`=$îdCar
								");

				
				/*while ($this->theContact[] = $sql->fetch());*/
				$this->theCar[] = $sql->fetch();
				return $this->theCar;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		private $carList;
		public function get($whereClause, $orderBy = 'price', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 13)
		{
			include("../Controller/ConfigConnGp.php");
			
			try
			{
			    $sql = $bdd->query("SELECT
										`car`.`id_car`,
										`brand`.`name` AS `brand`,
										`model`.`name` AS `model`,
										`motorization`.`name` AS `motorization`,
										`car`.`year`,
										`car`.`mileage`,
										`car`.`price`,
										`car`.`sold`,
										`car`.`image1`,
										`car`.`image2`,
										`car`.`image3`,
										`car`.`image4`,
										`car`.`image5`

									FROM `car`

									LEFT JOIN `brand`
										ON `car`.`id_brand` = `brand`.`id_brand`
									LEFT JOIN `model`
										ON `car`.`id_model` = `model`.`id_model`
									LEFT JOIN `motorization`
										ON `car`.`id_motorization` = `motorization`.`id_motorization`

									WHERE $whereClause
									ORDER BY `$orderBy` $ascOrDesc
									LIMIT $firstLine, $linePerPage
								");

				while ($this->carList[] = $sql->fetch());
				return $this->carList;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function addCar()
		{
			include("../Controller/ConfigConnGp.php");
			$sql = $bdd->query("SELECT `id_type` FROM `car_type` WHERE `type`='" . $this->type . "'");
			$id_type = $sql->fetch();
			$idCar = intval($id_type['id_type']);

			try {
				$bdd->exec("INSERT INTO `car` (`name`, `surname`, `pseudo`, `email`, `phone`, `password`, `id_type`)
							VALUES ('" . $this->name . "','" . $this->surname . "',
									'" . $this->pseudo . "','" . $this->email . "',
									'" . $this->phone . "','" . $this->password . "',
									'" . $idCar . "')");
			
			$sql = $bdd->query("SELECT `id_car` FROM `car` WHERE `email`='" . $this->email . "'");
			$id_car = $sql->fetch();
			$this->id_car = intval($id_car['id_car']);
			echo '<script>alert("L\'enregistrement est effectué!");</script>';

			} catch (Exception $e) {
				
				echo "Erreur de la requête : " . $e->getMessage();

			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function updateCar($idCar)
		{
			include("../Controller/ConfigConnGp.php");
			try
			{
				$sql = $bdd->query("SELECT `id_type` FROM `car_type` WHERE `type`='" . $this->type . "'");
				while ($id_type[] = $sql->fetch());

				$idCar = intval($idCar);
				
			    $bdd->exec("UPDATE `car` SET
								`name` = '" . $this->name . "',
								`surname` = '" . $this->surname . "',
								`pseudo` = '" . $this->pseudo . "',
								`email` = '" . $this->email . "',
								`phone` = '" . $this->phone . "',
								`password` = '" . $this->password . "',
								`id_type` = " . intval($id_type[0]['id_type']) . "
							WHERE `id_car` = " . $idCar . "
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

		public function deleteCar($id)
		{
			include("../Controller/ConfigConnGp.php");

			try
			{
			    $bdd->exec('DELETE FROM car WHERE id_car=' . $id);
				echo '<script>alert("Cet enregistrement est supprimé!");</script>';
				echo '<script>window.location.href = "http://garageparrot/index.php?page=car";</script>';
				die();
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

        //__Ajouter car?___________________________________________
        
        public function getAddCar()
        {
            if(is_null($_SESSION['addCar']))
            {
                $_SESSION['addCar']=false;
            }
            return $_SESSION['addCar'];
        }
        public function setAddCar($new)
        {
            $_SESSION['addCar']=$new;
        }

	}
	
?>