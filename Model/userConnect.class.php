<?php
	class userConnect
    {
        public function __construct()
        {
            $_SESSION['timeZone']="Europe/Paris";
            date_default_timezone_set($_SESSION['timeZone']);
        }
        
        public function getUserConnect()
        {
            if(is_null($_SESSION['userConnected']))
            {
                $_SESSION['userConnected'] = 'guest';
            }
            return $_SESSION['userConnected'];
        }

        public function SetUserConnect($new)
        {
            $_SESSION['userConnected'] = $new;
        }
    }
?>