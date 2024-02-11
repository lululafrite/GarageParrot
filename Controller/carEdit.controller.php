<?php

//***********************************************************************************************
// traitement droits utilisateur : renvoi vers la page erro_page.php si l'utilisateur et un Guest
//***********************************************************************************************

    if ($_SESSION['userConnected'] === "Guest"){

        if($_SESSION['local']===true){

            echo '<script>window.location.href = "http://garageparrot/index.php?page=error_page";</script>';
        
        }else{

            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=error_page";</script>';

        }
        exit();
    }

//***********************************************************************************************
// Daclaration de variables
//***********************************************************************************************

    $changeImage = false;

    include_once('../Model/car.class.php');
    $MyCar = new Car();
    
    $Cars = array();
    $car = array(
        "id_car" => ''
    );
    $Cars[0] = $car;

//***********************************************************************************************
// traitement du téléchargement des images 
//***********************************************************************************************

    if(isset($_POST['btn_image1']) || isset($_POST['btn_image2']) || isset($_POST['btn_image3']) || isset($_POST['btn_image4']) || isset($_POST['btn_image5'])){
        
        $uploadDirectory = './img/vehicle/';

        $_SESSION['uploadImage1'] = $_POST['txt_carEdit_image1'];
        $_SESSION['uploadImage2'] = $_POST['txt_carEdit_image2'];
        $_SESSION['uploadImage3'] = $_POST['txt_carEdit_image3'];
        $_SESSION['uploadImage4'] = $_POST['txt_carEdit_image4'];
        $_SESSION['uploadImage5'] = $_POST['txt_carEdit_image5'];

        if (isset($_FILES["fileInput1"]) && $_FILES["fileInput1"]["error"] == UPLOAD_ERR_OK){

            $_SESSION['uploadImage1'] = $_FILES["fileInput1"]["name"];
            $sourceFile = $_FILES["fileInput1"]["tmp_name"];
            $destinationFile = $uploadDirectory . basename($_FILES["fileInput1"]["name"]);
            unset($_FILES["fileInput1"]);

        }else if (isset($_FILES["fileInput2"]) && $_FILES["fileInput2"]["error"] == UPLOAD_ERR_OK){

            $sourceFile = $_FILES["fileInput2"]["tmp_name"];
            $_SESSION['uploadImage2'] = $_FILES["fileInput2"]["name"];
            $destinationFile = $uploadDirectory . basename($_FILES["fileInput2"]["name"]);
            unset($_FILES["fileInput2"]);

        }else if (isset($_FILES["fileInput3"]) && $_FILES["fileInput3"]["error"] == UPLOAD_ERR_OK){

            $sourceFile = $_FILES["fileInput3"]["tmp_name"];
            $_SESSION['uploadImage3'] = $_FILES["fileInput3"]["name"];
            $destinationFile = $uploadDirectory . basename($_FILES["fileInput3"]["name"]);
            unset($_FILES["fileInput3"]);

        }else if (isset($_FILES["fileInput4"]) && $_FILES["fileInput4"]["error"] == UPLOAD_ERR_OK){

            $sourceFile = $_FILES["fileInput4"]["tmp_name"];
            $_SESSION['uploadImage4'] = $_FILES["fileInput4"]["name"];
            $destinationFile = $uploadDirectory . basename($_FILES["fileInput4"]["name"]);
            unset($_FILES["fileInput4"]);

        }else if (isset($_FILES["fileInput5"]) && $_FILES["fileInput5"]["error"] == UPLOAD_ERR_OK){

            $sourceFile = $_FILES["fileInput5"]["tmp_name"];
            $_SESSION['uploadImage5'] = $_FILES["fileInput5"]["name"];
            $destinationFile = $uploadDirectory . basename($_FILES["fileInput5"]["name"]);
            unset($_FILES["fileInput5"]);

        }else{

            echo "<script>alert('Aucune image n'a été sélectionnée ou une erreur s'est produite.');</script>";
            return;
        }

        if(move_uploaded_file($sourceFile, $destinationFile)){

            echo "<script>alert('L\'image a été uploadée avec succès.');</script>";

        }else{

            echo "<script>alert('Désolé, une erreur s'est produite lors de l'upload de l'image.');</script>";
        
        }

        $changeImage = true;
    }

//***********************************************************************************************
// traitement du téléchargement des images 
//***********************************************************************************************

    if(isset($_POST['bt_carEdit_save']) && $_SESSION['errorFormCar'] === false)
    {
        //Récupération des valeurs des input du formulaire
        $MyCar->setBrand(strtoupper($_POST["list_carEdit_brand"]));
        $MyCar->setModel(strtolower($_POST["list_carEdit_model"]));
        $MyCar->setMotorization(strtolower($_POST["list_carEdit_motorization"]));
        $MyCar->setYear($_POST["txt_carEdit_year"]);
        $MyCar->setMileage($_POST['txt_carEdit_mileage']);
        $MyCar->setPrice($_POST["txt_carEdit_price"]);
        $MyCar->setSold(ucfirst(strtolower($_POST["list_carEdit_sold"])));
        $MyCar->setImage1($_POST["txt_carEdit_image1"]);
        $MyCar->setImage2($_POST["txt_carEdit_image2"]);
        $MyCar->setImage3($_POST["txt_carEdit_image3"]);
        $MyCar->setImage4($_POST["txt_carEdit_image4"]);
        $MyCar->setImage5($_POST["txt_carEdit_image5"]);
        
        if($_SESSION['newCar'] === true){
            // $req est la valeur retournée par la requete permettent de vérifier si ce véhicule n'est pas déjà existant en BD. 1 = exitant, 0 = non existant
            $req = $MyCar->verifCar($MyCar->getBrand(), $MyCar->getModel(), $MyCar->getMotorization(), $MyCar->getYear(), $MyCar->getMileage(), $MyCar->getPrice());
            
            if($req === 0){
                
                $MyCar->setId($MyCar->addCar()); // Requete qui ajoute le véhicule
                $_SESSION['newCar'] = false;
				echo '<script>alert("L\'enregistrement est effectué!");</script>';

            }else{
                
                echo '<script>alert("Ce véhicule existe déjà en base de donnée. Changez une valeur pour pouvoir l\'enregistrer (ex : +/-1km ou +/- 1€");</script>';
            
            }

        }else{
            // requete qui met à jour le véhicule
            $MyCar->updateCar($_POST['txt_carEdit_id']);

        }

    }else if(isset($_POST['nav_new_car']) || isset($_POST['bt_carEdit_new'])){
        
        if ($_SESSION['errorFormCar'] === false){
            // Vide le tableau pour que les input du formulaire soient vides après avoir cliqué sur le bouton nouveau
            $car = array(
                "id_car" => '',
                "brand" => '',
                "model" => '',
                "motorization" => '',
                "year" => '',
                "mileage" => '',
                "price" => '',
                "sold" => '',
                "image1" => '',
                "image2" => '',
                "image3" => '',
                "image4" => '',
                "image5" => ''
            );
            $Cars[0] = $car;

            $_SESSION['newCar'] = true;
            
        }

    }else if(isset($_POST['bt_carEdit_delete'])){
        // requete qui supprime le véhicule
        $MyCar->deleteCar($_POST["txt_carEdit_id"]);

    }else if(isset($_POST['bt_carEdit_cancel'])){
        
        $_SESSION['newCar'] = false;
        echo '<script>window.location.href = "http://garageparrot/index.php?page=car";</script>';

    }

    if($_SESSION['errorFormCar']===false){

        if(!$_SESSION['newCar']){
            // Traitement de récupération de l'id du véhicule en fonction des conditions
            if(isset($_POST['txt_carEdit_id']) && !empty($_POST['txt_carEdit_id'])){
                
                $MyCar->setId($_POST['txt_carEdit_id']);

            }else if($Cars[0]['id_car'] != ''){

                $MyCar->setId($Cars[0]['id_car']);

            }
            // Requete SELECT permettant de récupérer les données du véhicule en fonction de l'id traité ci-dessus
            $Cars = $MyCar->getCar($MyCar->getId());
            //Traitement des input image si une nouvelle image est téléchargée 
            if($changeImage === true){

                $Cars[0]['image1'] = $_SESSION['uploadImage1'];
                $Cars[0]['image2'] = $_SESSION['uploadImage2'];
                $Cars[0]['image3'] = $_SESSION['uploadImage3'];
                $Cars[0]['image4'] = $_SESSION['uploadImage4'];
                $Cars[0]['image5'] = $_SESSION['uploadImage5'];

                if(isset($_POST['btn_image1'])){

                    $Cars[0]['image1'] = $_SESSION['uploadImage1'];
                    unset($_POST['btn_image1']);

                }else if(isset($_POST['btn_image2'])){

                    $Cars[0]['image2'] = $_SESSION['uploadImage2'];
                    unset($_POST['btn_image2']);

                }else if(isset($_POST['btn_image3'])){

                    $Cars[0]['image3'] = $_SESSION['uploadImage3'];
                    unset($_POST['btn_image3']);

                }else if(isset($_POST['btn_image4'])){

                    $Cars[0]['image4'] = $_SESSION['uploadImage4'];
                    unset($_POST['btn_image4']);

                }else if(isset($_POST['btn_image5'])){

                    $Cars[0]['image5'] = $_SESSION['uploadImage5'];
                    unset($_POST['btn_image5']);

                }

                $changeImage = false;
            }
        }
        
        //Traiment de la BD pour récupérer les données destinées à l'input liste brand
        include_once('../Model/brand.class.php');
        $Brands = new Brand();
        $MyBrand = $Brands->get(1,'name', 'ASC', 0, 50);
        unset($Brands);

        //Traiment de la BD pour récupérer les données destinées à l'input liste model
        include_once('../Model/model.class.php');
        $Models = new Model();
        $MyModel = $Models->get(1,'name', 'ASC', 0, 50);
        unset($Models);

        //Traiment de la BD pour récupérer les données destinées à l'input liste motorization
        include_once('../Model/motorization.class.php');
        $Motorizations = new Motorization();
        $MyMotorization = $Motorizations->get(1,'name', 'ASC', 0, 50);
        unset($Motorizations);
    }

?>