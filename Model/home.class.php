<?php

use Symfony\Component\Intl\Scripts;

use function PHPSTORM_META\type;

	class Home
	{

		function __construct()
		{
		}

		//-----------------------------------------------------------------------

		private $id_home;
		public function getId()
		{
			return $this->id_home;
		}
		public function setId($new)
		{
			$this->id_home = $new;
		}

		//-----------------------------------------------------------------------

		private $titre1;
		public function getTitre1()
		{
			return $this->titre1;
		}
		public function setTitre1($new)
		{
			$this->titre1 = $new;
		}

		//-----------------------------------------------------------------------

		private $intro_chapter1;
		public function getIntro_chapter1()
		{
			return $this->intro_chapter1;
		}
		public function setIntro_chapter1($new)
		{
			$this->intro_chapter1 = $new;
		}

		//-----------------------------------------------------------------------

		private $intro_chapter2;
		public function getIntro_chapter2()
		{
			return $this->intro_chapter2;
		}
		public function setIntro_chapter2($new)
		{
			$this->intro_chapter2 = $new;
		}

		//-----------------------------------------------------------------------

		private $titre2;
		public function getTitre2()
		{
			return $this->titre2;
		}
		public function setTitre2($new)
		{
			$this->titre2 = $new;
		}

		//-----------------------------------------------------------------------

		private $article1_titre;
		public function getArticle1_titre()
		{
			return $this->article1_titre;
		}
		public function setArticle1_titre($new)
		{
			$this->article1_titre = $new;
		}

		//-----------------------------------------------------------------------

		private $article1_chapter1;
		public function getArticle1_chapter1()
		{
			return $this->article1_chapter1;
		}
		public function setArticle1_chapter1($new)
		{
			$this->article1_chapter1 = $new;
		}

		//-----------------------------------------------------------------------

		private $article1_chapter2;
		public function getArticle1_chapter2()
		{
			return $this->article1_chapter2;
		}
		public function setArticle1_chapter2($new)
		{
			$this->article1_chapter2 = $new;
		}


		//-----------------------------------------------------------------------

		private $article2_titre;
		public function getArticle2_titre()
		{
			return $this->article2_titre;
		}
		public function setArticle2_titre($new)
		{
			$this->article2_titre = $new;
		}

		//-----------------------------------------------------------------------

		private $article2_chapter1;
		public function getArticle2_chapter1()
		{
			return $this->article2_chapter1;
		}
		public function setArticle2_chapter1($new)
		{
			$this->article2_chapter1 = $new;
		}

		//-----------------------------------------------------------------------

		private $article2_chapter2;
		public function getArticle2_chapter2()
		{
			return $this->article2_chapter2;
		}
		public function setArticle2_chapter2($new)
		{
			$this->article2_chapter2 = $new;
		}

		//-----------------------------------------------------------------------

		private $theHome;
		public function getHome($îdHome)
		{
			include('../Controller/ConfigConnGP.php');
            date_default_timezone_set($_SESSION['timeZone']);
			
			try
			{
			    $sql = $bdd->query("SELECT
										`home`.`id_home`,
										`home`.`titre1`,
										`home`.`intro_chapter1`,
										`home`.`intro_chapter2`,
										`home`.`titre2`,
										`home`.`article1_titre`,
										`home`.`article1_chapter1`,
										`home`.`article1_chapter2`,
										`home`.`article2_titre`,
										`home`.`article2_chapter1`,
										`home`.`article2_chapter2`

									FROM `home`
									
									WHERE `home`.`id_home`=$îdHome
								");

				/*while ($this->theContact[] = $sql->fetch());*/
				$this->theHome[] = $sql->fetch();
				return $this->theHome;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		private $homeList;
		public function get($whereClause, $orderBy = 'id_home', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 13)
		{
			include('../Controller/ConfigConnGP.php');
			
			try
			{
			    $sql = $bdd->query("SELECT
										`home`.`id_home`,
										`home`.`titre1`,
										`home`.`intro_chapter1`,
										`home`.`intro_chapter2`,
										`home`.`titre2`,
										`home`.`article1_titre`,
										`home`.`article1_chapter1`,
										`home`.`article1_chapter2`,
										`home`.`article2_titre`,
										`home`.`article2_chapter1`,
										`home`.`article2_chapter2`

									FROM `home`

									WHERE $whereClause
									ORDER BY $orderBy $ascOrDesc
									LIMIT $firstLine, $linePerPage
								");

				while ($this->homeList[] = $sql->fetch());
				return $this->homeList;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function updateHome($idHome)
		{
			include('../Controller/ConfigConnGP.php');
			try{
				$stmt = $bdd->prepare("UPDATE `home`
				SET `titre1` = ?,
					`intro_chapter1` = ?,
					`intro_chapter2` = ?,
					`titre2` = ?,
					`article1_titre` = ?,
					`article1_chapter1` = ?,
					`article1_chapter2` = ?,
					`article2_titre` = ?,
					`article2_chapter1` = ?,
					`article2_chapter2` = ?
				WHERE `id_home` = ?");

				$stmt->execute([$this->titre1,
						$this->intro_chapter1,
						$this->intro_chapter2,
						$this->titre2,
						$this->article1_titre,
						$this->article1_chapter1,
						$this->article1_chapter2,
						$this->article2_titre,
						$this->article2_chapter1,
						$this->article2_chapter2,
						$idHome]);
							
				echo '<script>alert("Les modifications sont enregistrées!");</script>';
			}
			catch (PDOException $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function deleteHome($id)
		{
			include('../Controller/ConfigConnGP.php');

			try
			{
			    $bdd->exec('DELETE FROM home WHERE id_home =' . $id);
				echo '<script>alert("Cet enregistrement est supprimé!");</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

        //__Ajouter user?___________________________________________
        
        public function getAddHome()
        {
            if(is_null($_SESSION['addHome']))
            {
                $_SESSION['addHome']=false;
            }
            return $_SESSION['addHome'];
        }
        public function setAddHome($new)
        {
            $_SESSION['addHome']=$new;
        }

	}
	
?>