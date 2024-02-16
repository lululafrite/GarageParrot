<?php

use Symfony\Component\Intl\Scripts;

use function PHPSTORM_META\type;

	class Comment
	{

		function __construct()
		{
		}

		//-----------------------------------------------------------------------

		private $id;
		public function getId()
		{
			return $this->id;
		}
		public function setId($new)
		{
			$this->id = $new;
		}

		//-----------------------------------------------------------------------

		private $date_;
		public function getDate_()
		{
			return $this->date_;
		}
		public function setDate_($new)
		{
			$this->date_ = $new;
		}

		//-----------------------------------------------------------------------

		private $pseudo;
		public function getPseudo()
		{
			return $this->pseudo;
		}
		public function setPseudo($new)
		{
			$this->pseudo = $new;
		}

		//-----------------------------------------------------------------------

		private $rating;
		public function getRating()
		{
			return $this->rating;
		}
		public function setRating($new)
		{
			$this->rating = $new;
		}

		//-----------------------------------------------------------------------

		private $comment;
		public function getComment()
		{
			return $this->comment;
		}
		public function setComment($new)
		{
			$this->comment = $new;
		}

		//-----------------------------------------------------------------------

		private $theComment;
		public function getComments($îdComment)
		{
			include('../Controller/ConfigConnGP.php');

            //$_SESSION['timeZone']="Europe/Paris";
            date_default_timezone_set($_SESSION['timeZone']);
			//$labd = $_SESSION['db'];
			
			try
			{
			    $sql = $bdd->query("SELECT
										`comment`.`id_comment`,
										`comment`.`date_`,
										`comment`.`pseudo`,
										`comment`.`rating`,
										`comment`.`comment`

									FROM `comment`
									
									WHERE `comment`.`id_comment`=$îdComment
								");

				/*while ($this->theContact[] = $sql->fetch());*/
				$this->theComment[] = $sql->fetch();
				return $this->theComment;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		private $CommentList;
		public function get($whereClause, $orderBy = 'date_', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 30)
		{
			include('../Controller/ConfigConnGP.php');
			
			try
			{
			    $sql = $bdd->query("SELECT
										`comment`.`id_comment`,
										`comment`.`date_`,
										`comment`.`pseudo`,
										`comment`.`rating`,
										`comment`.`comment`

									FROM `comment`

									WHERE $whereClause
									ORDER BY $orderBy $ascOrDesc
									LIMIT $firstLine, $linePerPage
								");

				while ($this->CommentList[] = $sql->fetch());
				return $this->CommentList;
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------
		private $idComment;
		public function addComment()
		{
			include('../Controller/ConfigConnGP.php');

			try{
				
				$sql = $bdd->query("SELECT `comment`.`id_comment`
									FROM  `comment`
									WHERE `comment`.`date_` = '" . $this->date_ . "' AND
										  `comment`.`pseudo` = '" . $this->pseudo . "' AND
										  `comment`.`rating` = '" . $this->rating . "' AND
										  `comment`.`comment` = '" . $this->comment . "'
								  ");

				if(!$sql->fetch()){
					$bdd->exec("INSERT INTO `comment`(`date_`,`pseudo`,`rating`,`comment`)
								VALUES(
										'" . $this->date_ . "',
										'" . $this->pseudo . "',
										'" . $this->rating . "',
										'" . $this->comment . "'
									)
								");
					
					$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = $bdd->query("SELECT MAX(`id_comment`) AS idMax FROM `comment`");
					$result = $sql->fetch(PDO::FETCH_ASSOC);
					$this->id = $result['idMax'];

					echo '<script>alert("L\'enregistrement est effectué!");</script>';
				}

			}catch (Exception $e){
				
				echo "Erreur de la requête : " . $e->getMessage();

			}

			$bdd=null;
		}

		//-----------------------------------------------------------------------

		public function updateComment($idComment)
		{
			include('../Controller/ConfigConnGP.php');
			try
			{
				$bdd->exec("UPDATE `comment`
							SET `date_` =  '" . $this->date_ . "',
								`pseudo` =  '" . $this->pseudo . "',
								`rating` =  '" . $this->rating . "',
								`comment` =  '" . $this->comment . "'

								WHERE `id_commnt` = '" . $idComment . "'
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

		public function deleteComment($id)
		{
			include('../Controller/ConfigConnGP.php');

			try
			{
				$sql = $bdd->query("SELECT `comment`.`id_comment`
									FROM  `comment`
									WHERE `comment`.`id_comment` = '" . $id . "'
								  ");
				$id_comment = $sql->fetch();
				//$ValeurId = $id_comment[0];

				if($id_comment){
					$bdd->exec('DELETE FROM comment WHERE id_comment=' . $id);
					echo '<script>alert("Cet enregistrement est supprimé!");</script>';
				}
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$bdd=null;
		}

        //__Ajouter user?___________________________________________
        
        public function getAddComment()
        {
            if(is_null($_SESSION['addComment']))
            {
                $_SESSION['addComment']=false;
            }
            return $_SESSION['addComment'];
        }
        public function setAddSchedules($new)
        {
            $_SESSION['addComment']=$new;
        }

	}
	
?>