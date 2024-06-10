<?php

    $_SESSION['userConnected'] = 'Guest';
    $_SESSION['pseudoUser']= 'Guest';
    $_SESSION['connexion'] = false;
    
    include_once('../common/utilies.php');
    routeToHomePage();

?>