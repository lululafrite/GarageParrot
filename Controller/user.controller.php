<?php

//---------------------------------------------------------------
//---Product page controller-------------------------------------
//---------------------------------------------------------------
//---Checking access permissions---
    if ($_SESSION['userConnected'] != "Administrator") {
        if($_SESSION['local']===true){
            echo '<script>window.location.href = "http://garageparrot/index.php?page=error_page";</script>';
        }
        else{
            echo '<script>window.location.href = "https://www.follaco.fr/gp/index.php?page=error_page";</script>';
        }
        exit();
    }

//---Load model product--------------------
        require('../Model/user.class.php');
    
//---Configure the database table--
        $_SESSION['theTable'] = "user";

//---------------------------------------------------------------
//---Dynamic script of the contact page--------------------------
//---------------------------------------------------------------

    if(isset($_POST['bt__userEdit--update']) && $_SESSION['errorFormUser'] === false)
    {
        $MyUser = new User();

        $MyUser->setName($_POST["txt--Name_User"]);
        $MyUser->setSurname($_POST["txt--Surname_User"]);
        $MyUser->setPseudo($_POST["txt--Pseudo_User"]);
        $MyUser->setEmail($_POST["txt--Email_User"]);
        $MyUser->setType($_POST['list_User_Type']);
        $MyUser->setPhone($_POST["txt--Phone_User"]);
        $MyUser->setPassword($_POST["txt--Password_User"]);
        
        $MyUser->updateUser($_POST["txt__user--id"]);
    }
    elseif(isset($_POST['btDelete']))
    {
        $MyUser = new User($_POST["txtId"]);
        
        $MyUser->deleteUser();
    }
    else
    {
        // Initialiser les variables pour la clause where afin d'executer la requete SELECT pour rechercher un ou plusieurs contacts
        $name_umpty = true;
        $pseudo_umpty = true;
        $userType_umpty = true;

        $whereClause = "";
        
        $criteriaName = "";
        $criteriaPseudo = "";
        $criteriaUserType = "";

        if(isset($_POST['Text_User_Nom'])){
            $_SESSION['criteriaName'] = $_POST['Text_User_Nom'];
        }else if ($_SESSION['NextOrPrevious'] === false){
            $_SESSION['criteriaName'] = "";
        }

        if(isset($_POST['Text_User_Pseudo'])){
            $_SESSION['criteriaPseudo'] = $_POST['Text_User_Pseudo'];
        }else if ($_SESSION['NextOrPrevious'] === false){
            $_SESSION['criteriaPseudo'] = "";
        }

        if(isset($_POST['Select_User_Type'])){
            $_SESSION['criteriaUserType'] = $_POST['Select_User_Type'];
        }else if ($_SESSION['NextOrPrevious'] === false){
            $_SESSION['criteriaUserType'] = "Select";
        }

        // Vérifier quels sont les critères de recharche utilisés
        if(isset($_SESSION['criteriaName']) && $_SESSION['criteriaName'] != ""){
            //$_SESSION['criteriaName'] = $_POST["Text_User_Nom"];
            $criteriaName = $_SESSION['criteriaName'];
            $name_umpty = false;
        }
        if(isset($_SESSION['criteriaPseudo']) && $_SESSION['criteriaPseudo'] != ""){
            //$_SESSION['criteriaPseudo'] = $_POST["Text_User_Pseudo"];
            $criteriaPseudo = $_SESSION['criteriaPseudo'];
            $pseudo_umpty = false;
        }
        if(isset($_SESSION['criteriaUserType']) && $_SESSION['criteriaUserType'] != ""){
            //$_SESSION['criteriaUserType'] = $_POST["Select_User_Type"];
            if($_SESSION['criteriaUserType'] === "Select"){
                $criteriaUserType = "";
                $userType_umpty = true;
            }else{
                $criteriaUserType = $_SESSION['criteriaUserType'];
                $userType_umpty = false;
            }
        }

        // Paramètrage de la clause WHERE pour executer la requete SELECT pour rechercher un ou plusieurs contacts
        if($name_umpty === true && $pseudo_umpty === true && $userType_umpty === true){
            
            $whereClause = 1;

        }else if($name_umpty === false && $pseudo_umpty === false && $userType_umpty === false){

            $whereClause = "`user`.`name` LIKE '%$criteriaName%' AND
                            `user`.`pseudo` LIKE '%$criteriaPseudo%' AND
                            `user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='$criteriaUserType')";

        }else if($name_umpty === true && $pseudo_umpty === false && $userType_umpty === false){

            $whereClause = "`user`.`pseudo` LIKE '%$criteriaPseudo%' AND
                            `user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='$criteriaUserType')";
            
        }else if($name_umpty === true && $pseudo_umpty === true && $userType_umpty === false){

            $whereClause = "`user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='$criteriaUserType')";
            
        }else if($name_umpty === true && $pseudo_umpty === false && $userType_umpty === true){

            $whereClause = "`user`.`pseudo` LIKE '%$criteriaPseudo%'";

        }else if($name_umpty === false && $pseudo_umpty === true && $userType_umpty === false){

            $whereClause = "`user`.`name` LIKE '%$criteriaName%' AND
                            `user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='$criteriaUserType')";
            
        }else if($name_umpty === false && $pseudo_umpty === true && $userType_umpty === true){

            $whereClause = "`user`.`name` LIKE '%$criteriaName%'";
            
        }else if($name_umpty === false && $pseudo_umpty === false && $userType_umpty === true){

            $whereClause = "`user`.`name` LIKE '%$criteriaName%' AND
                            `user`.`pseudo` LIKE '%$criteriaPseudo%'";

        }
        
        $_SESSION['whereClause'] =  $whereClause;

        $MyUser = new User();
        // Executer la requete SELECT pour rechercher les contacts en fonction de la clause WHERE
        if($_SESSION['errorFormUser']===false){
            
            //$_SESSION['req'] =  "SELECT count(*) FROM `" . $_SESSION['theTable'] . "` WHERE " . $whereClause ;

            require_once('../Controller/page.controller.php');

            $users = $MyUser->get($whereClause, 'name', 'ASC', $MyPage->getFirstLine(), $_SESSION['ligneParPage']);

        }

        if(isset($_POST['btAdd'])){

            $MyUser->setName($_POST["txtname"]);
            $MyUser->setSurname($_POST["txtSurname"]);
            $MyUser->setPseudo($_POST["txtPseudo"]);
            $MyUser->setEmail($_POST["txtEmail"]);
            $MyUser->setPassword($_POST["txtPassword"]);
            $MyUser->setType($_POST["txtType"]);

            $MyUser->addUser();
            $MyUser->setAddUser(true);
        }
    }

    if (isset($_POST['nbOfLine'])){
		
        $_POST['nbOfLine'] = null;

	}
?>