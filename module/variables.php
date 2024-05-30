<?php
    
    // La variable $_SESSION['local'] mettre à false si online et à true si serveur local
    // Cette variable agit sur le controleur 'ConfigConnGP.php' pour les paramètres de connexion
    $_SESSION['local']=true;
    
    if (!isset($_SESSION['userConnected'])) {
        
        $_SESSION['userConnected'] = 'Guest';
        $_SESSION['pseudoUser'] = 'Guest';
        $_SESSION['connexion'] = false;

        $_SESSION['laPage'] = 1;
        $_SESSION['firstLine'] = 0;
        $_SESSION['ligneParPage'] = 3;
        $_SESSION['nbOfPage'] = 1;
        $_SESSION['nbOfProduct'] = 1;
        $_SESSION['NextOrPrevious'] = false;

        $_SESSION['theTable'] = 'car';

        $_SESSION['addCar'] = false;
        $_SESSION['newCar'] = false;
        $_SESSION['errorFormCar'] = false;
        $_SESSION['carBrand'] = '_';
        $_SESSION['carModel'] = '_';
        $_SESSION['carMotorization'] = '_';
        $_SESSION['carSold'] = 'Oui';
        $_SESSION['uploadImage1'] = '_.png';
        $_SESSION['uploadImage2'] = '_.png';
        $_SESSION['uploadImage3'] = '_.png';
        $_SESSION['uploadImage4'] = '_.png';
        $_SESSION['uploadImage5'] = '_.png';
        //Variable critères de recharche car
        $_SESSION['criteriaBrand'] = 'Selectionnez une marque';
        $_SESSION['criteriaModel'] = 'Selectionnez un modele';
        $_SESSION['criteriaMileage'] = 'Selectionnez un kilometrage maxi';
        $_SESSION['criteriaPrice'] = 'Selectionnez un prix maxi';

        $_SESSION['addBrand'] = false;
        $_SESSION['addModel']=false;
        $_SESSION['addMotorization']=false;

        $_SESSION['addUser'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['userType'] = '_';
        $_SESSION['errorFormUser'] = false;
        //Variable critères de recharche user
        $_SESSION['criteriaName'] = '';
        $_SESSION['criteriaPseudo'] = '';
        $_SESSION['criteriaType'] = 'Selectionnez un type';

        $_SESSION['whereClause'] = 1;

        //$_SESSION['local']=true;
        $_SESSION['timeZone']="Europe/Paris";
    }

?>