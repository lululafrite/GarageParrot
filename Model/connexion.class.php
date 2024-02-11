<?php
	class userConnect
    {
        public function __construct()
        {
            //$_SESSION['timeZone']="Europe/Paris";
            //date_default_timezone_set($_SESSION['timeZone']);
        }
        
        private $userConnected;
        public function getUserConnect()
        {
            if(is_null($this->userConnected)) //is_null($_SESSION['userConnected']))
            {
                $this->userConnected = 'Guest';
                $_SESSION['userConnected'] = 'Guest';
            }
            return $this->userConnected; // $_SESSION['userConnected'];
        }

        public function SetUserConnect($new)
        {
            $_SESSION['userConnected'] = $new;
            $this->userConnected = $new;
        }
        
        private $connexion;
        public function getConnexion()
        {
            $_SESSION['connexion'] = $this->connexion;
            return $_SESSION['connexion'];
        }

        public function SetConnexion($new)
        {
            $_SESSION['connexion'] = $new;
            $this->connexion = $new;
        }

        private $dataConnect;
        public function queryConnect($email,$pw){

            require('../Controller/ConfigConnGP.php');

            $resultat2 = $bdd->query("SELECT `pseudo`, `user_type`.`type` AS `type`
                                        FROM `user`
                                        LEFT JOIN `user_type`
                                        ON `user`.`id_type` = `user_type`.`id_type`
                                        WHERE `email`='" . $email . "' AND `password`='" . $pw . "'");

            $this->dataConnect = $resultat2->fetch();
            
            //$this->SetUserConnect($this->dataConnect['type']);
            //$_SESSION['pseudoUser']=$this->dataConnect['pseudo'];

            return $this->dataConnect;

        }
    }
?>