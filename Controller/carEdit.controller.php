<?php

    //---Load model user--------------------
    require_once('../Model/car.class.php');
    //---Configure object User--
    $MyUser = new User();
        
    //---Configure the database table--
    $_SESSION['theTable'] = "user";


    //initialisez messages input Formulaire edition user
    $MessageId = "<span>Votre numéro d'identifiant. Ce numèro est incrémenté automatiquement par la robot.</span>";
    $MessageName = "<span>Saisissez votre Nom d'une longueur de 50 caractères maximum.</span>";
    $MessageSurname = "<span>Saisissez votre Prénom d'une longueur de 50 caractères maximum.</span>";
    $MessagePseudo = "<span>Saisissez votre pseudonyme d'une longueur de 20 caractères maximum.</span>";
    $MessageEmail = "<span>Saisissez votre adresse de courriel d'une longueur maximum de 255 caractères.</span>";
    $MessagePhone = "<span>Saisissez votre N° de téléphone.</span>";
    $MessageType = "<span>Selectionnez le type d'utilisateur dans la liste de choix.</span>";
    $MessagePassword = "<span>Saisissez un mot de passe de 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants /*-.!?@</span>";
    $MessageConfirm = "<span>Confirmez le mot de passe.</span>";

    if(isset($_POST['bt__userEdit_save']))
    {
        // Initialisez la variable d'erreur
        //$_SESSION['errorFormUser']=false;
        //if($_SESSION['connexion'] === true){

        //    $_SESSION['userConnected']= 'Administrator';
        //}

        // Vérifiez si le champ "txt--Name_idr" est vide
        if (empty($_POST['txt__user--id'])) {

            // Si le champ est vide, définissez un message d'erreur
            $MessageName = "<span>Votre numéro d'identifiant. Ce numèro est incrémenté automatiquement par la robot.</span>";
            $inputId = "";
            if($_SESSION['newUser'] === false){
                $_SESSION['errorFormUser']=true;
            }

        }else{

            $inputId = $_POST['txt__user--id'];

        }

        if (empty($_POST['txt--Name_User'])){

            $MessageName = "<span style='color:red;'>Vous devez saisir votre nom!!!</span>";
            $inputName = "";
            $_SESSION['errorFormUser']=true;

        }else{

            $inputName = strtoupper($_POST['txt--Name_User']);

        }

        if (empty($_POST['txt--Surname_User'])){

            $MessageSurname = "<span style='color:red;'>Vous devez saisir votre prénom!!!</span>";
            $inputSurname = "";
            $_SESSION['errorFormUser']=true;

        }else{

            $inputSurname = ucfirst(strtolower($_POST['txt--Surname_User']));

        }

        if (empty($_POST['txt--Pseudo_User'])){

            $MessagePseudo = "<span style='color:red;'>Vous devez saisir un pseudonyme d'une longueur de 20 caractères maximum.!!!</span>";
            $inputPseudo = "";
            $_SESSION['errorFormUser']=true;

        }else{

            $inputPseudo = $_POST['txt--Pseudo_User'];

        }

        //$courriel = $_POST['txt--Email_User'];
        if (empty($_POST['txt--Email_User'])){

            $MessageEmail = "<span style='color:red;'>Vous devez saisir une adresse email!!!</span>";
            $inputEmail = "";
            $_SESSION['errorFormUser']=true;
            
        }else{

            if (filter_var($_POST['txt--Email_User'], FILTER_VALIDATE_EMAIL)){
                
                $inputEmail = $_POST['txt--Email_User'];

            }else{

                $MessageEmail = "<span style='color:red;'>Vous devez saisir une adresse email conforme!!! exemple : prenom.nom@google.com</span>";
                $inputEmail = "";

            }

        }

        if (empty($_POST['txt--Phone_User'])){

            $MessagePhone = "<span style='color:red;'>Vous devez saisir votre numèro de téléphone !!! Exemple : 06 05 04 03 02</span>";
            $inputPhone = "";
            $_SESSION['errorFormUser']=true;

        }else{

            $inputPhone = $_POST['txt--Phone_User'];

        }

        if (empty($_SESSION['userType'])){

            $MessageType = "<span style='color:red;'>Vous devez selectionner un type d'utlisateur dans la liste de choix!!!";
            $inputType = "";
            $_SESSION['errorFormUser']=true;

        }else{

            $inputType = $_SESSION['userType'];

        }

        if (empty($_POST['txt--Password_User'])){

            $MessagePassword = "<span style='color:red;'>Vous devez saisir un mot de passe!!!";
            $inputPassword = "";
            $_SESSION['errorFormUser']=true;

        }else{

            if($_POST['txt--Password_User'] === $_POST['txt--Confirm_User']){

                $pw = $_POST['txt--Password_User'];
                if(preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\/\*\-\.\!\?@])[A-Za-z\d\/\*\-\.\!\?@]{8,}$/', $pw)){

                    $inputPassword = $_POST['txt--Password_User'];
                    $inputConfirm = $_POST['txt--Password_User'];

                }else{

                    $MessagePassword = "<span style='color:red;'>Vous devez respecter la syntaxe!!! Votre mot de passe doit contenir 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants /*-.!?@";
                    $_SESSION['errorFormUser']=true;

                }
            }else{

                $MessagePassword = "<span style='color:red;'>Le mot de passe et le mot de passe de confirmation ne correspondent pas!!! Votre mot de passe doit contenir 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants /*-.!?@";
                $inputPassword = "";
                $inputConfirm = "";
                $_SESSION['errorFormUser']=true;

            }
        }
    }

//----------------------------------------------------------------------------------------


    if ($_SESSION['userConnected'] === "Guest"){

        if($_SESSION['local']===true){

            echo '<script>window.location.href = "http://garageparrot/index.php?page=error_page";</script>';
        
        }else{

            echo '<script>window.location.href = "https://www.follaco.fr/gp/index.php?page=error_page";</script>';

        }
        exit();
    }
    
    //$MyUser = new user();

    //if($_SESSION['connexion'] === false){

    //    $MyUserConnect = new userConnect();
    //    $_SESSION['userConnected'] = $MyUserConnect->getUserConnect();

    //}


//---------------------------------------------------------------
//---Dynamic script of the user page--------------------------
//---------------------------------------------------------------

    $confirmationNeeded = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['bt__userEdit_delete']) && $_SESSION['errorFormUser'] === false) {
            $confirmationNeeded = true;
        }
    }

    if(isset($_POST['bt__userEdit_save']) && $_SESSION['errorFormUser'] === false)
    {
        //$MyUser = new User();
    
        $MyUser->setName(strtoupper($_POST["txt--Name_User"]));
        $MyUser->setSurname(ucfirst(strtolower($_POST["txt--Surname_User"])));
        $MyUser->setPseudo($_POST["txt--Pseudo_User"]);
        $MyUser->setEmail($_POST["txt--Email_User"]);
        $MyUser->setType($_POST['list_User_Type']);
        $MyUser->setPhone($_POST["txt--Phone_User"]);
        $MyUser->setPassword($_POST["txt--Password_User"]);
        
        if($_SESSION['newUser'] === true){

            $MyUser->addUser();
            //$_SESSION['newUser'] = false;

        }else{

            $MyUser->updateUser($_POST["txt__user--id"]);

        }

    }else if(isset($_POST['nav_new_user']) || isset($_POST['bt__userEdit_new'])){
        
        if ($_SESSION['errorFormUser'] === false){
            
            $MyUser->setName("");
            $MyUser->setSurname("");
            $MyUser->setPseudo("");
            $MyUser->setEmail("");
            $MyUser->setType("");
            $MyUser->setPhone("");
            $MyUser->setPassword("");

            $MyUser->setNewUser(true);
            $_SESSION['newUser'] = true;
            
        }

    }else if($confirmationNeeded === true)
    {

        $MyUser->deleteUser($_POST["txt__user--id"]);

    }

    if($_SESSION['errorFormUser']===false){

        //include_once('../Controller/user.controller.php');
        if(!isset($_POST['bt__userEdit_new'])){
            
            if($MyUser->getNewUser() === true){ //$_SESSION['newUser'] === true){

                $id = $MyUser->getId();
                $MyUser->setNewUser(false);
                
            }else{

                $id = $_POST['txt__user--id'];

            }

        }

        if(isset($id) || !empty($id)){

            $users = $MyUser->getUser($id);

            $MyUser->setId($users[0]['id_user']);
            $MyUser->setName($users[0]['name']);
            $MyUser->setSurname($users[0]['surname']);
            $MyUser->setPseudo($users[0]['pseudo']);
            $MyUser->setEmail($users[0]['email']);
            $MyUser->setPhone($users[0]['phone']);
            $MyUser->setType($users[0]['type']);
            $MyUser->setPassword($users[0]['password']);

            $userPseudo = $MyUser->getPseudo();

        }

    }

?>