<?php

use Symfony\Component\Intl\Scripts;

use function PHPSTORM_META\type;

include_once('../controller/ConfigConnGP.php');

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
			$conn = connectDB();
            date_default_timezone_set($_SESSION['timeZone']);
			
			try
			{
			    $sql = $conn->query("SELECT
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

			$conn=null;
		}

		//-----------------------------------------------------------------------

		private $CommentList;
		public function get($whereClause, $orderBy = 'date_', $ascOrDesc = 'ASC', $firstLine = 0, $linePerPage = 30)
		{
			$conn = connectDB();
            date_default_timezone_set($_SESSION['timeZone']);
			
			try
			{
			    $sql = $conn->query("SELECT
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

			$conn=null;
		}

		//-----------------------------------------------------------------------
		private $idComment;
		public function addComment()
		{
			$conn = connectDB();
            date_default_timezone_set($_SESSION['timeZone']);

			try{

				// Requête préparée
				$query = $conn->prepare("SELECT `comment`.`id_comment`
										FROM  `comment`
										WHERE `comment`.`date_` = :date_
										AND `comment`.`pseudo` = :pseudo
										AND `comment`.`rating` = :rating
										AND `comment`.`comment` = :comment");

				// Liaison des valeurs
				$query->bindParam(':date_', $this->date_);
				$query->bindParam(':pseudo', $this->pseudo);
				$query->bindParam(':rating', $this->rating);
				$query->bindParam(':comment', $this->comment);

				// Exécution de la requête
				$query->execute();

				// Récupération du résultat
				$result = $query->fetch(PDO::FETCH_ASSOC);

				if (!$result) {


					$query = $conn->prepare("INSERT INTO `comment` (`date_`, `pseudo`, `rating`, `comment`) VALUES (:date_, :pseudo, :rating, :comment)");

					// Liaison des valeurs
					$query->bindParam(':date_', $this->date_);
					$query->bindParam(':pseudo', $this->pseudo);
					$query->bindParam(':rating', $this->rating);
					$query->bindParam(':comment', $this->comment);

					// Exécution de la requête
					$query->execute();
					
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = $conn->query("SELECT MAX(`id_comment`) AS idMax FROM `comment`");
					$result = $sql->fetch(PDO::FETCH_ASSOC);
					$this->id = $result['idMax'];

					echo '<script>alert("L\'enregistrement est effectué!");</script>';
				}

			}catch (Exception $e){
				
				echo "Erreur de la requête : " . $e->getMessage();

			}

			$conn=null;
		}

		//-----------------------------------------------------------------------

		public function updateComment($idComment)
		{
			$conn = connectDB();
            date_default_timezone_set($_SESSION['timeZone']);

			try
			{
				// Requête préparée
				$query = $conn->prepare("UPDATE `comment`
				SET `date_` = :date_,
					`pseudo` = :pseudo,
					`rating` = :rating,
					`comment` = :comment
				WHERE `id_comment` = :idComment");

				// Liaison des valeurs
				$query->bindParam(':date_', $this->date_);
				$query->bindParam(':pseudo', $this->pseudo);
				$query->bindParam(':rating', $this->rating);
				$query->bindParam(':comment', $this->comment);
				$query->bindParam(':idComment', $idComment);

				// Exécution de la requête
				$query->execute();
				
				echo '<script>alert("Les modifications sont enregistrées!");</script>';
			}
			catch (Exception $e)
			{
				echo "Erreur de la requete :" . $e->GetMessage();
			}

			$conn=null;
		}

		//-----------------------------------------------------------------------
		
		public function deleteComment($id)
		{
			$conn = connectDB();
            date_default_timezone_set($_SESSION['timeZone']);

			try {
				// Requête préparée pour la sélection
				$query = $conn->prepare("SELECT `comment`.`id_comment`
										FROM  `comment`
										WHERE `comment`.`id_comment` = :id");

				// Liaison de la valeur
				$query->bindParam(':id', $id);

				// Exécution de la requête
				$query->execute();

				// Récupération du résultat
				$id_comment = $query->fetch(PDO::FETCH_COLUMN);

				// Vérification si l'ID existe
				if ($id_comment !== false) {
					// Requête préparée pour la suppression
					$deleteQuery = $conn->prepare('DELETE FROM comment WHERE id_comment = :id_comment');

					// Liaison de la valeur
					$deleteQuery->bindParam(':id_comment', $id_comment);

					// Exécution de la requête de suppression
					$deleteQuery->execute();

					echo '<script>alert("Cet enregistrement est supprimé!");</script>';
				} else {
					// L'ID n'existe pas, gestion de l'erreur si nécessaire
					echo '<script>alert("L\'enregistrement avec cet ID n\'existe pas!");</script>';
				}
			} catch (Exception $e) {
				echo "Erreur de la requête : " . $e->getMessage();
			}

			$conn = null;
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