<?php

    //---Load model car--------------------
    include_once('../Model/car.class.php');
    //---Configure object Car--
    $MyCar = new Car();
        
    //---Configure the database table--
    $_SESSION['theTable'] = "car";


    //initialisez messages input Formulaire edition car
    $MessageId = "<span>Votre numéro d'identifiant. Ce numèro est incrémenté automatiquement par la robot.</span>";
    $MessageName = "<span>Saisissez votre Nom d'une longueur de 50 caractères maximum.</span>";
    $MessageSurname = "<span>Saisissez votre Prénom d'une longueur de 50 caractères maximum.</span>";
    $MessagePseudo = "<span>Saisissez votre pseudonyme d'une longueur de 20 caractères maximum.</span>";
    $MessageEmail = "<span>Saisissez votre adresse de courriel d'une longueur maximum de 255 caractères.</span>";
    $MessagePhone = "<span>Saisissez votre N° de téléphone.</span>";
    $MessageType = "<span>Selectionnez le type d'utilisateur dans la liste de choix.</span>";
    $MessagePassword = "<span>Saisissez un mot de passe de 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants /*-.!?@</span>";
    $MessageConfirm = "<span>Confirmez le mot de passe.</span>";

    if(isset($_POST['bt__carEdit_save']))
    {
        // Initialisez la variable d'erreur
        //$_SESSION['errorFormCar']=false;
        //if($_SESSION['connexion'] === true){

        //    $_SESSION['carConnected']= 'Administrator';
        //}

        // Vérifiez si le champ "txt--Name_idr" est vide
        if (empty($_POST['txt__car--id'])) {

            // Si le champ est vide, définissez un message d'erreur
            $MessageName = "<span>Votre numéro d'identifiant. Ce numèro est incrémenté automatiquement par la robot.</span>";
            $inputId = "";
            if($_SESSION['newCar'] === false){
                $_SESSION['errorFormCar']=true;
            }

        }else{

            $inputId = $_POST['txt__Car--id'];

        }

        if (empty($_POST['txt--Name_Car'])){

            $MessageName = "<span style='color:red;'>Vous devez saisir votre nom!!!</span>";
            $inputName = "";
            $_SESSION['errorFormCar']=true;

        }else{

            $inputName = strtoupper($_POST['txt--Name_Car']);

        }

        if (empty($_POST['txt--Surname_Car'])){

            $MessageSurname = "<span style='color:red;'>Vous devez saisir votre prénom!!!</span>";
            $inputSurname = "";
            $_SESSION['errorFormCar']=true;

        }else{

            $inputSurname = ucfirst(strtolower($_POST['txt--Surname_Car']));

        }

        if (empty($_POST['txt--Pseudo_Car'])){

            $MessagePseudo = "<span style='color:red;'>Vous devez saisir un pseudonyme d'une longueur de 20 caractères maximum.!!!</span>";
            $inputPseudo = "";
            $_SESSION['errorFormCar']=true;

        }else{

            $inputPseudo = $_POST['txt--Pseudo_Car'];

        }

        //$courriel = $_POST['txt--Email_Car'];
        if (empty($_POST['txt--Email_Car'])){

            $MessageEmail = "<span style='color:red;'>Vous devez saisir une adresse email!!!</span>";
            $inputEmail = "";
            $_SESSION['errorFormCar']=true;
            
        }else{

            if (filter_var($_POST['txt--Email_Car'], FILTER_VALIDATE_EMAIL)){
                
                $inputEmail = $_POST['txt--Email_Car'];

            }else{

                $MessageEmail = "<span style='color:red;'>Vous devez saisir une adresse email conforme!!! exemple : prenom.nom@google.com</span>";
                $inputEmail = "";

            }

        }

        if (empty($_POST['txt--Phone_Car'])){

            $MessagePhone = "<span style='color:red;'>Vous devez saisir votre numèro de téléphone !!! Exemple : 06 05 04 03 02</span>";
            $inputPhone = "";
            $_SESSION['errorFormCar']=true;

        }else{

            $inputPhone = $_POST['txt--Phone_Car'];

        }

        if (empty($_SESSION['carType'])){

            $MessageType = "<span style='color:red;'>Vous devez selectionner un type d'utlisateur dans la liste de choix!!!";
            $inputType = "";
            $_SESSION['errorFormCar']=true;

        }else{

            $inputType = $_SESSION['carType'];

        }

        if (empty($_POST['txt--Password_Car'])){

            $MessagePassword = "<span style='color:red;'>Vous devez saisir un mot de passe!!!";
            $inputPassword = "";
            $_SESSION['errorFormCar']=true;

        }else{

            if($_POST['txt--Password_Car'] === $_POST['txt--Confirm_Car']){

                $pw = $_POST['txt--Password_Car'];
                if(preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\/\*\-\.\!\?@])[A-Za-z\d\/\*\-\.\!\?@]{8,}$/', $pw)){

                    $inputPassword = $_POST['txt--Password_Car'];
                    $inputConfirm = $_POST['txt--Password_Car'];

                }else{

                    $MessagePassword = "<span style='color:red;'>Vous devez respecter la syntaxe!!! Votre mot de passe doit contenir 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants /*-.!?@";
                    $_SESSION['errorFormCar']=true;

                }
            }else{

                $MessagePassword = "<span style='color:red;'>Le mot de passe et le mot de passe de confirmation ne correspondent pas!!! Votre mot de passe doit contenir 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants /*-.!?@";
                $inputPassword = "";
                $inputConfirm = "";
                $_SESSION['errorFormCar']=true;

            }
        }
    }

//----------------------------------------------------------------------------------------


    if ($_SESSION['userConnected'] === "Guest"){

        if($_SESSION['local']===true){

            echo '<script>window.location.href = "http://garageparrot/index.php?page=error_page";</script>';
        
        }else{

            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=error_page";</script>';

        }
        exit();
    }
    
    //$MyCar = new car();

    //if($_SESSION['connexion'] === false){

    //    $MyCarConnect = new carConnect();
    //    $_SESSION['carConnected'] = $MyCarConnect->getCarConnect();

    //}


//---------------------------------------------------------------
//---Dynamic script of the car page--------------------------
//---------------------------------------------------------------

    $confirmationNeeded = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['bt__carEdit_delete']) && $_SESSION['errorFormCar'] === false) {
            $confirmationNeeded = true;
        }
    }

    if(isset($_POST['bt__carEdit_save']) && $_SESSION['errorFormCar'] === false)
    {
        //$MyCar = new Car();
    
        $MyCar->setBrand(strtoupper($_POST["txt--Brand_Car"]));
        $MyCar->setModel(ucfirst(strtolower($_POST["txt--Model_Car"])));
        $MyCar->setMotorization($_POST["txt--Motorization_Car"]);
        $MyCar->setYear($_POST["txt--Year_Car"]);
        $MyCar->setMileage($_POST['list_Mieage_Type']);
        $MyCar->setPrice($_POST["txt--Price_Car"]);
        $MyCar->setSold($_POST["txt--Sold_Car"]);
        $MyCar->setImage1($_POST["txt--Image1_Car"]);
        $MyCar->setImage2($_POST["txt--Image2_Car"]);
        $MyCar->setImage3($_POST["txt--Image3_Car"]);
        $MyCar->setImage4($_POST["txt--Image4_Car"]);
        $MyCar->setImage5($_POST["txt--Image5_Car"]);
        
        if($_SESSION['newCar'] === true){

            $MyCar->addCar();

        }else{

            $MyCar->updateCar($_POST["txt__car--id"]);

        }

    }else if(isset($_POST['nav_new_car']) || isset($_POST['bt__carEdit_new'])){
        
        if ($_SESSION['errorFormCar'] === false){
            
            $MyCar->setBrand("");
            $MyCar->setModel("");
            $MyCar->setMotorization("");
            $MyCar->setYear("");
            $MyCar->setMileage("");
            $MyCar->setPrice("");
            $MyCar->setSold("");
            $MyCar->setImage1("");
            $MyCar->setImage2("");
            $MyCar->setImage3("");
            $MyCar->setImage4("");
            $MyCar->setImage5("");

            $MyCar->setNewCar(true);
            $_SESSION['newCar'] = true;
            
        }

    }else if($confirmationNeeded === true)
    {

        $MyCar->deleteCar($_POST["txt__car--id"]);

    }

    if($_SESSION['errorFormCar']===false){

        //include_once('../Controller/car.controller.php');
        if(!isset($_POST['bt__carEdit_new'])){
            
            if($MyCar->getNewCar() === true){ //$_SESSION['newCar'] === true){

                $id = $MyCar->getId();
                $MyCar->setNewCar(false);
                
            }else{

                $id = $_POST['txt__Car--id'];

            }

        }

        if(isset($id) || !empty($id)){

            $cars = $MyCar->getCar($id);
            
            $MyCar->setID($cars[0]['id_car']);
            $MyCar->setBrand($cars[0]['brand']);
            $MyCar->setModel($cars[0]['model']);
            $MyCar->setMotorization($cars[0]['motorization']);
            $MyCar->setYear($cars[0]['year']);
            $MyCar->setMileage($cars[0]['mileage']);
            $MyCar->setPrice($cars[0]['price']);
            $MyCar->setSold($cars[0]['sold']);
            $MyCar->setImage1($cars[0]['image1']);
            $MyCar->setImage2($cars[0]['image2']);
            $MyCar->setImage3($cars[0]['image3']);
            $MyCar->setImage4($cars[0]['image4']);
            $MyCar->setImage5($cars[0]['image5']);

        }

    }

?>