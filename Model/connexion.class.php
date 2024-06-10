<?php
	class userConnect
    {
        private $dataConnect;
        public function queryConnect($email, $pw)
        {
            include_once('../controller/ConfigConnGP.php');
            $conn = connectDB();
            date_default_timezone_set($_SESSION['timeZone']);

            try {
                $stmt = $conn->prepare("SELECT
                                        `pseudo`,
                                        `user_type`.`type` AS `type`
                                       
                                        FROM `user`

                                        LEFT JOIN `user_type`
                                        ON `user`.`id_type` = `user_type`.`id_type`

                                        WHERE `email` = :email AND `password` = :pw");

                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':pw', $pw, PDO::PARAM_STR);

                $stmt->execute();

                $this->dataConnect = $stmt->fetch(PDO::FETCH_ASSOC);

                return $this->dataConnect;

            }catch (PDOException $e){

                echo '<script>alert("Erreur de la requête : ' . $e->getMessage() . '");</script>';
                return null;

            }

            $conn = null;
        }

    }
?>