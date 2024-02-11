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
			include('../Controller/ConfigConnGp.php');

            //$_SESSION['timeZone']="Europe/Paris";
            date_default_timezone_set($_SESSION['timeZone']);
			
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
			include('../Controller/ConfigConnGp.php');

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
			include('../Controller/ConfigConnGp.php');

			try {
					$bdd->exec("INSERT INTO `car`(`id_brand`,`id_model`,`id_motorization`,`year`,`mileage`,
											`price`,`sold`,`image1`,`image2`,`image3`,`image4`,`image5`)
								VALUES(
										(SELECT `id_brand` FROM `brand` WHERE `name`= '" . $this->brand . "'),
										(SELECT `id_model` FROM `model` WHERE `name`= '" . $this->model . "'),
										(SELECT `id_motorization` FROM `motorization` WHERE `name`= '" . $this->motorization . "'),
										'" . $this->year . "',
										'" . $this->mileage . "',
										'" . $this->price . "',
										'" . $this->sold . "',
										'" . $this->image1 . "',
										'" . $this->image2 . "',
										'" . $this->image3 . "',
										'" . $this->image4 . "',
										'" . $this->image5 . "'
									)
								");
								
				$sql = $bdd->query("SELECT MAX(`id_car`) FROM `car`");
				$id_car_ = $sql->fetch();
				$this->id_car = intval($id_car_[0]);
				return intval($id_car_[0]);

			} catch (Exception $e) {
				
				echo "Erreur de la requête : " . $e->getMessage();

			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function updateCar($idCar)
		{
			include('../Controller/ConfigConnGp.php');
			
			try
			{
				$idCar = intval($idCar);
				
			    $bdd->exec("UPDATE `car`
							SET `id_brand` = (SELECT `id_brand` FROM `brand` WHERE `name`= '" . $this->brand . "'),
								`id_model` = (SELECT `id_model` FROM `model` WHERE `name`= '" . $this->model . "'),
								`id_motorization` = (SELECT `id_motorization` FROM `motorization` WHERE `name`= '" . $this->motorization . "'),
								`year` =  '" . $this->year . "',
								`mileage` =  '" . $this->mileage . "',
								`price` =  '" . $this->price . "',
								`sold` =  '" . $this->sold . "',
								`image1` =  '" . $this->image1 . "',
								`image2` =  '" . $this->image2 . "',
								`image3` =  '" . $this->image3 . "',
								`image4` =  '" . $this->image4 . "',
								`image5` =  '" . $this->image5 . "'

								WHERE `id_car` = $idCar
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
			include('../Controller/ConfigConnGp.php');

			try
			{
			    $bdd->exec('DELETE FROM car WHERE id_car=' . $id);
				echo '<script>alert("Cet enregistrement est supprimé!");</script>';
				echo '<script>window.location.href = "http://garageparrot/index.php?page=car";</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------
		private $carExist;
		public function verifCar($brand, $model, $motorization, $year, $mileage, $price)
		{
			include('../Controller/ConfigConnGp.php');

			try
			{
			    $sql = $bdd->query("SELECT COUNT(*) AS `number`
									FROM
										`car`
									WHERE
										`id_brand` = (SELECT `id_brand` FROM `brand` WHERE `name` = '" . $brand . "')
										AND `id_model` = (SELECT `id_model` FROM `model` WHERE `name` = '" . $model . "')
										AND `id_motorization` = (SELECT `id_motorization` FROM `motorization` WHERE `name` = '" . $motorization . "')
										AND `year` = '" . $year . "'
										AND `mileage` = '" . $mileage . "'
										AND `price` = '" . $price . "';
								");

				while ($this->carExist[] = $sql->fetch());
				return $this->carExist[0][0];
				//$id_car_ = $sql->fetch();
				//$this->id_car = intval($id_car_[0]);
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