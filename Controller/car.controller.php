<?php
//---Load model car--------------------
    include('../Model/car.class.php');
//---Configure object Car--
    $MyCar = new Car();
    
//---Configure the database table--
    $_SESSION['theTable'] = "car";

//---------------------------------------------------------------
//---Dynamic script of the car page--------------------------
//---------------------------------------------------------------

    // Initialiser les variables pour paramètrer la clause where afin d'executer la requete SELECT pour rechercher le ou les contacts
    $brand_umpty = true;
    $model_umpty = true;
    $mileage_umpty = true;
    $price_umpty = true;

    $whereClause = "";
    
    $criteriaBrand = "";
    $criteriaModel = "";
    $criteriaMileage = "";
    $criteriaPrice = "";

    if(isset($_POST['Text_Car_brand'])){
        $_SESSION['criteriaBrand'] = $_POST['Text_Car_Brand'];
    }else if ($_SESSION['NextOrPrevious'] === false){
        $_SESSION['criteriaBrand'] = "";
    }

    if(isset($_POST['Text_Car_Model'])){
        $_SESSION['criteriaModel'] = $_POST['Text_Car_Model'];
    }else if ($_SESSION['NextOrPrevious'] === false){
        $_SESSION['criteriaModel'] = "";
    }

    if(isset($_POST['Select_Car_Mileage'])){
        $_SESSION['criteriaCarMileage'] = $_POST['Select_Car_Mileage'];
    }else if ($_SESSION['NextOrPrevious'] === false){
        $_SESSION['criteriaCarMileage'] = "Select";
    }

    if(isset($_POST['Select_Car_Price'])){
        $_SESSION['criteriaCarPrice'] = $_POST['Select_Car_Price'];
    }else if ($_SESSION['NextOrPrevious'] === false){
        $_SESSION['criteriaCarPrice'] = "Select";
    }

    // Vérifier quels sont les critères de recharche utilisés
    if(isset($_SESSION['criteriaBrand']) && $_SESSION['criteriaBrand'] != ""){
        if($_SESSION['criteriaCarBrand'] === "Select"){
            $criteriaCarBrand = "";
            $brand_umpty = true;
        }else{
            $criteriaCarBrand = $_SESSION['criteriaCarBrand'];
            $brand_umpty = false;
        }
    }
    if(isset($_SESSION['criteriaModel']) && $_SESSION['criteriaModel'] != ""){
        if($_SESSION['criteriaCarModel'] === "Select"){
            $criteriaCarModel = "";
            $model_umpty = true;
        }else{
            $criteriaCarModel = $_SESSION['criteriaCarModel'];
            $model_umpty = false;
        }
    }
    if(isset($_SESSION['criteriaCarMileage']) && $_SESSION['criteriaCarMileage'] != ""){
        if($_SESSION['criteriaCarMileage'] === "Select"){
            $criteriaCarMileage = "";
            $mileage_umpty = true;
        }else{
            $criteriaCarMileage = $_SESSION['criteriaCarMileage'];
            $mileage_umpty = false;
        }

    }
    if(isset($_SESSION['criteriaCarPrice']) && $_SESSION['criteriaCarPrice'] != ""){
        if($_SESSION['criteriaCarPrice'] === "Select"){
            $criteriaCarPrice = "";
            $price_umpty = true;
        }else{
            $criteriaCarPrice = $_SESSION['criteriaCarPrice'];
            $price_umpty = false;
        }

    }

    // Paramètrage de la clause WHERE pour executer la requete SELECT pour rechercher un ou plusieurs contacts
    if($brand_umpty === true && $model_umpty === true && $mileage_umpty === true && $price_umpty === true){
        
        $whereClause = 1;

    }else if($brand_umpty === false && $model_umpty === false && $mileage === false && $price === false){

        $whereClause = "`car`.`brand` = (SELECT `brand`.`id_type` FROM `brand` WHERE `brand`.`name`='$criteriaCarBrand') AND
                        `car`.`model` = (SELECT `model`.`id_model` FROM `model` WHERE `model`.`name`='$criteriaCarModel') AND
                        `car`.`mileage` < '$criteriaCarMileage' AND
                        `car`.`price` < '$criteriaCarType'";

    }else if($name_umpty === true && $pseudo_umpty === false && $carType_umpty === false){

        $whereClause = "`car`.`pseudo` LIKE '%$criteriaPseudo%' AND
                        `car`.`id_type` = (SELECT `car_type`.`id_type` FROM `car_type` WHERE `car_type`.`type`='$criteriaCarType')";
        
    }else if($name_umpty === true && $pseudo_umpty === true && $carType_umpty === false){

        $whereClause = "`car`.`id_type` = (SELECT `car_type`.`id_type` FROM `car_type` WHERE `car_type`.`type`='$criteriaCarType')";
        
    }else if($name_umpty === true && $pseudo_umpty === false && $carType_umpty === true){

        $whereClause = "`car`.`pseudo` LIKE '%$criteriaPseudo%'";

    }else if($name_umpty === false && $pseudo_umpty === true && $carType_umpty === false){

        $whereClause = "`car`.`name` LIKE '%$criteriaName%' AND
                        `car`.`id_type` = (SELECT `car_type`.`id_type` FROM `car_type` WHERE `car_type`.`type`='$criteriaCarType')";
        
    }else if($name_umpty === false && $pseudo_umpty === true && $carType_umpty === true){

        $whereClause = "`car`.`name` LIKE '%$criteriaName%'";
        
    }else if($name_umpty === false && $pseudo_umpty === false && $carType_umpty === true){

        $whereClause = "`car`.`name` LIKE '%$criteriaName%' AND
                        `car`.`pseudo` LIKE '%$criteriaPseudo%'";

    }
    
    $_SESSION['whereClause'] =  $whereClause;

    // Executer la requete SELECT pour rechercher les contacts en fonction de la clause WHERE
    if($_SESSION['errorFormCar']===false && $MyCar->getNewCar() === false ){
        
        require_once('../Controller/page.controller.php');
        $Cars = $MyCar->get($whereClause, 'price', 'ASC', $MyPage->getFirstLine(), $_SESSION['ligneParPage']);
        
    }

    if (isset($_POST['nbOfLine'])){
		
        $_POST['nbOfLine'] = null;

	}
?>