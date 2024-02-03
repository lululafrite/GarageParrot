<?php
    $MessageId = "<span>Votre numéro d'identifiant. Ce numèro est incrémenté automatiquement par la robot.</span>";
    $MessageName = "<span>Saisissez votre Nom d'une longueur de 50 caractères maximum.</span>";
    $MessageSurname = "<span>Saisissez votre Prénom d'une longueur de 50 caractères maximum.</span>";
    $MessagePseudo = "<span>Saisissez votre pseudonyme d'une longueur de 20 caractères maximum.</span>";
    $MessageEmail = "<span>Saisissez votre adresse de courriel d'une longueur maximum de 255 caractères.</span>";
    $MessagePhone = "<span>Saisissez votre N° de téléphone.</span>";
    $MessageType = "<span>Selectionnez le type d'utilisateur dans la liste de choix.</span>";
    $MessagePassword = "<span>Saisissez un mot de passe de 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants /*-.!?@</span>";
    $MessageConfirm = "<span>Confirmez le mot de passe.</span>";
    
    // Vérifiez si des données ont été envoyées via la méthode POST
    /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Parcourez toutes les données dans $_POST
        foreach ($_POST as $key => $value) {
            // Affichez la clé et la valeur
            echo "Clé : " . htmlspecialchars($key) . ", Valeur : " . htmlspecialchars($value) . "<br>";
        }
    }*/
    

    if(isset($_POST['bt__userEdit--update']))
    {
        // Initialisez la variable d'erreur
        //$_SESSION['errorFormUser']=false;
        if($_SESSION['connected'] === true){
            $_SESSION['userConnected']= 'Administrator';
            //$user = 'Administrator';
        }
        // Vérifiez si le champ "txt--Name_idr" est vide
        if (empty($_POST['txt__user--id'])) {
            // Si le champ est vide, définissez un message d'erreur
            $MessageName = "<span>Votre numéro d'identifiant. Ce numèro est incrémenté automatiquement par la robot.</span>";
            $inputId = "";
            $_SESSION['errorFormUser']=true;
        }else{
            //$inputNom = $_POST['txt--Nameid'];
            $inputId = $_POST['txt__user--id'];
        }

        if (empty($_POST['txt--Name_User'])) {
            $MessageName = "<span style='color:red;'>Vous devez saisir votre nom!!!</span>";
            $inputName = "";
            $_SESSION['errorFormUser']=true;
        }else{
            $inputName = strtoupper($_POST['txt--Name_User']);
        }

        if (empty($_POST['txt--Surname_User'])) {
            $MessageSurname = "<span style='color:red;'>Vous devez saisir votre prénom!!!</span>";
            $inputSurname = "";
            $_SESSION['errorFormUser']=true;
        }else{
            $inputSurname = ucfirst(strtolower($_POST['txt--Surname_User']));
        }

        if (empty($_POST['txt--Pseudo_User'])) {
            $MessagePseudo = "<span style='color:red;'>Vous devez saisir un pseudonyme d'une longueur de 20 caractères maximum.!!!</span>";
            $inputPseudo = "";
            $_SESSION['errorFormUser']=true;
        }else{
            $inputPseudo = $_POST['txt--Pseudo_User'];
        }

        //$courriel = $_POST['txt--Email_User'];
        if (empty($_POST['txt--Email_User'])) {
            $MessageEmail = "<span style='color:red;'>Vous devez saisir une adresse email!!!</span>";
            $inputEmail = "";
            $_SESSION['errorFormUser']=true;
        }else{
            if (filter_var($_POST['txt--Email_User'], FILTER_VALIDATE_EMAIL)) {
                $inputEmail = $_POST['txt--Email_User'];
            }else {
                $MessageEmail = "<span style='color:red;'>Vous devez saisir une adresse email conforme!!! exemple : prenom.nom@google.com</span>";
                $inputEmail = "";
            }
        }

        if (empty($_POST['txt--Phone_User'])) {
            $MessagePhone = "<span style='color:red;'>Vous devez saisir votre numèro de téléphone !!! Exemple : 06 05 04 03 02</span>";
            $inputPhone = "";
            $_SESSION['errorFormUser']=true;
        }else{
            $inputPhone = $_POST['txt--Phone_User'];
        }

        if (empty($_SESSION['userType'])) {
            $MessageType = "<span style='color:red;'>Vous devez selectionner un type d'utlisateur dans la liste de choix!!!";
            $inputType = "";
            $_SESSION['errorFormUser']=true;
        }else{
            $inputType = $_SESSION['userType'];
        }

        if (empty($_POST['txt--Password_User'])) {
            $MessagePassword = "<span style='color:red;'>Vous devez saisir un mot de passe!!!";
            $inputPassword = "";
            $_SESSION['errorFormUser']=true;
        }else{
            if($_POST['txt--Password_User'] === $_POST['txt--Confirm_User']){
                $pw = $_POST['txt--Password_User'];
                if(preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\/\*\-\.\!\?@])[A-Za-z\d\/\*\-\.\!\?@]{8,}$/', $pw)){
                    $inputPassword = $_POST['txt--Password_User'];
                    $inputConfirm = $_POST['txt--Password_User'];
                }
                else{
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

    if ($_SESSION['userConnected'] === "Guest") {
        if($_SESSION['local']===true){
            echo '<script>window.location.href = "http://garageparrot/index.php?page=error_page";</script>';
        }
        else{
            echo '<script>window.location.href = "https://www.follaco.fr/gp/index.php?page=error_page";</script>';
        }
        exit();
    }
    
    include_once('../Controller/user.controller.php');
    //require_once('../Model/user.class.php');
    //include_once('../Model/company.class.php');
    //include_once('../Model/type.class.php');
    //include_once('../Model/site.class.php');
    //include_once('../Controller/page.controller.php');
    if($_SESSION['connected'] === false){
        $MyUserConnect = new userConnect();
        $_SESSION['userConnected'] = $MyUserConnect->getUserConnect();
    }
    
    if($_SESSION['errorFormUser']===false){
        $MyUser = new user();
        $id = $_POST['txt__user--id'];
        $users = $MyUser->getUser($id);
        //unset($MyUser);
        //var_dump($users);

        /*$MyCompany = new Company();
        $companies = $MyCompany->get('company_name', 'ASC', 0, 50);
        unset($MyCompany);*/

        /*$MyUser = new User();
        $theUsers = $MyUser->get('user_name', 'ASC', 0, 50);
        unset($MyUser);*/

        /*$MySite = new Site();
        $theSites = $MySite->get(1, 'site_name','ASC', 0, 50);
        unset($MySite);*/

        //$MyUser = new User();
        $userPseudo = $MyUser->getPseudo();
        unset($MyUser);
    }
?>