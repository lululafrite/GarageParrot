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
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=error_page";</script>';
        }
        exit();
    }

//---Load model user--------------------
    include('../Model/user.class.php');
//---Configure object User--
    $MyUser = new User();
    
//---Configure the database table--
    $_SESSION['theTable'] = "user";

//---------------------------------------------------------------
//---Dynamic script of the user page--------------------------
//---------------------------------------------------------------

    // Initialiser les variables pour paramètrer la clause where afin d'executer la requete SELECT pour rechercher le ou les contacts
    $name_umpty = true;
    $pseudo_umpty = true;
    $userType_umpty = true;

    $whereClause = "";

    if(isset($_POST['Text_User_Nom']) && $_POST['Text_User_Nom'] != ''){
        $_SESSION['criteriaName'] = $_POST['Text_User_Nom'];
        $name_umpty = false;
    }else if(!empty($_SESSION['criteriaName']) && $_SESSION['criteriaName'] === ''){
        $_SESSION['criteriaName'] = "";
    }else if($_SESSION['NextOrPrevious'] === false){
        $_SESSION['criteriaName'] = "";
    }else{
        $name_umpty = false;
    }

    if(isset($_POST['Text_User_Pseudo']) && $_POST['Text_User_Pseudo'] != ''){
        $_SESSION['criteriaPseudo'] = $_POST['Text_User_Pseudo'];
        $pseudo_umpty = false;
    }else if(!empty($_SESSION['criteriaPseudo']) && $_SESSION['criteriaPseudo'] === ''){
        $_SESSION['criteriaPseudo'] = "";
    }else if($_SESSION['NextOrPrevious'] === false){
        $_SESSION['criteriaName'] = "";
    }else{
        $pseudo_umpty = false;
    }

    if(isset($_POST['Select_User_Type']) && $_POST['Select_User_Type'] != 'Selectionnez un type'){
        $_SESSION['criteriaType'] = $_POST['Select_User_Type'];
        $userType_umpty = false;
    }else if(!empty($_SESSION['criteriaType']) && $_SESSION['criteriaType'] === 'Selectionnez un type'){
        $_SESSION['criteriaType'] = "";
    }else if($_SESSION['NextOrPrevious'] === false){
        $_SESSION['criteriaType'] = "";
    }else{
        $userType_umpty = false;
    }
    
    // Paramètrage de la clause WHERE pour executer la requete SELECT pour rechercher un ou plusieurs contacts
    if($name_umpty === true && $pseudo_umpty === true && $userType_umpty === true){
        
        $whereClause = 1;

    }else if($name_umpty === false && $pseudo_umpty === false && $userType_umpty === false){

        $whereClause = "`user`.`name` LIKE '%" . $_SESSION['criteriaName'] . "%' AND
                        `user`.`pseudo` LIKE '%" . $_SESSION['criteriaPseudo'] . "%' AND
                        `user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='" . $_SESSION['criteriaType'] . "')";

    }else if($name_umpty === true && $pseudo_umpty === false && $userType_umpty === false){

        $whereClause = "`user`.`pseudo` LIKE '%" . $_SESSION['criteriaName'] . "%' AND
                        `user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='" . $_SESSION['criteriaType'] . "')";
        
    }else if($name_umpty === true && $pseudo_umpty === true && $userType_umpty === false){

        $whereClause = "`user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='" . $_SESSION['criteriaType'] . "')";
        
    }else if($name_umpty === true && $pseudo_umpty === false && $userType_umpty === true){

        $whereClause = "`user`.`pseudo` LIKE '%" . $_SESSION['criteriaName'] . "%'";

    }else if($name_umpty === false && $pseudo_umpty === true && $userType_umpty === false){

        $whereClause = "`user`.`name` LIKE '%" . $_SESSION['criteriaName'] . "%' AND
                        `user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='" . $_SESSION['criteriaType'] . "')";
        
    }else if($name_umpty === false && $pseudo_umpty === true && $userType_umpty === true){

        $whereClause = "`user`.`name` LIKE '%" . $_SESSION['criteriaName'] . "%'";
        
    }else if($name_umpty === false && $pseudo_umpty === false && $userType_umpty === true){

        $whereClause = "`user`.`name` LIKE '%" . $_SESSION['criteriaName'] . "%' AND
                        `user`.`pseudo` LIKE '%" . $_SESSION['criteriaName'] . "%'";

    }
    
    $_SESSION['whereClause'] =  $whereClause;

    // Executer la requete SELECT pour rechercher les contacts en fonction de la clause WHERE
    if($_SESSION['errorFormUser']===false && $MyUser->getNewUser() === false ){
        
        include_once('../Controller/page.controller.php');
        $users = $MyUser->get($whereClause, 'name', 'ASC', $MyPage->getFirstLine(), $_SESSION['ligneParPage']);
    }

    if (isset($_POST['nbOfLine'])){
		
        $_POST['nbOfLine'] = null;

	}
?>


<?php /*
// Initialiser les variables pour paramètrer la clause where afin d'executer la requete SELECT pour rechercher le ou les contacts
    $name_umpty = true;
    $pseudo_umpty = true;
    $userType_umpty = true;

    $whereClause = "";
    
    " . $_SESSION['criteriaName'] . " = "";
    " . $_SESSION['criteriaName'] . " = "";
    " . $_SESSION['criteriaType'] . " = "";

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
        " . $_SESSION['criteriaName'] . " = $_SESSION['criteriaName'];
        $name_umpty = false;
    }
    if(isset($_SESSION['criteriaPseudo']) && $_SESSION['criteriaPseudo'] != ""){
        //$_SESSION['criteriaPseudo'] = $_POST["Text_User_Pseudo"];
        " . $_SESSION['criteriaName'] . " = $_SESSION['criteriaPseudo'];
        $pseudo_umpty = false;
    }
    if(isset($_SESSION['criteriaUserType']) && $_SESSION['criteriaUserType'] != ""){
        //$_SESSION['criteriaUserType'] = $_POST["Select_User_Type"];
        if($_SESSION['criteriaUserType'] === "Select"){
            " . $_SESSION['criteriaType'] . " = "";
            $userType_umpty = true;
        }else{
            " . $_SESSION['criteriaType'] . " = $_SESSION['criteriaUserType'];
            $userType_umpty = false;
        }

    }

    // Paramètrage de la clause WHERE pour executer la requete SELECT pour rechercher un ou plusieurs contacts
    if($name_umpty === true && $pseudo_umpty === true && $userType_umpty === true){
        
        $whereClause = 1;

    }else if($name_umpty === false && $pseudo_umpty === false && $userType_umpty === false){

        $whereClause = "`user`.`name` LIKE '%" . $_SESSION['criteriaName'] . "%' AND
                        `user`.`pseudo` LIKE '%" . $_SESSION['criteriaName'] . "%' AND
                        `user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='" . $_SESSION['criteriaType'] . "')";

    }else if($name_umpty === true && $pseudo_umpty === false && $userType_umpty === false){

        $whereClause = "`user`.`pseudo` LIKE '%" . $_SESSION['criteriaName'] . "%' AND
                        `user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='" . $_SESSION['criteriaType'] . "')";
        
    }else if($name_umpty === true && $pseudo_umpty === true && $userType_umpty === false){

        $whereClause = "`user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='" . $_SESSION['criteriaType'] . "')";
        
    }else if($name_umpty === true && $pseudo_umpty === false && $userType_umpty === true){

        $whereClause = "`user`.`pseudo` LIKE '%" . $_SESSION['criteriaName'] . "%'";

    }else if($name_umpty === false && $pseudo_umpty === true && $userType_umpty === false){

        $whereClause = "`user`.`name` LIKE '%" . $_SESSION['criteriaName'] . "%' AND
                        `user`.`id_type` = (SELECT `user_type`.`id_type` FROM `user_type` WHERE `user_type`.`type`='" . $_SESSION['criteriaType'] . "')";
        
    }else if($name_umpty === false && $pseudo_umpty === true && $userType_umpty === true){

        $whereClause = "`user`.`name` LIKE '%" . $_SESSION['criteriaName'] . "%'";
        
    }else if($name_umpty === false && $pseudo_umpty === false && $userType_umpty === true){

        $whereClause = "`user`.`name` LIKE '%" . $_SESSION['criteriaName'] . "%' AND
                        `user`.`pseudo` LIKE '%" . $_SESSION['criteriaName'] . "%'";

    }
    
    $_SESSION['whereClause'] =  $whereClause;

    // Executer la requete SELECT pour rechercher les contacts en fonction de la clause WHERE
    if($_SESSION['errorFormUser']===false && $MyUser->getNewUser() === false ){
        
        include_once('../Controller/page.controller.php');
        $users = $MyUser->get($whereClause, 'name', 'ASC', $MyPage->getFirstLine(), $_SESSION['ligneParPage']);
    
    }

    if (isset($_POST['nbOfLine'])){
		
        $_POST['nbOfLine'] = null;

	}
*/?>