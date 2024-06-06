<?php

    // Genered key 32 bytes
    function generate32ByteKey(){
        $key = bin2hex(random_bytes(32));
        //echo $key;
        return $key;
    }

    // Create and verification of CSRF token
    function verifCsrf($varCsrf) {
            
        $value_Is = false;

        if(isset($_POST[$varCsrf]) && $_POST[$varCsrf] === $_SESSION[$varCsrf]){
            
            $value_Is = true;

        }

        if(empty($_SESSION[$varCsrf])){

            $csrf = bin2hex(random_bytes(32));
            $_SESSION[$varCsrf] = $csrf;

        }

        return $value_Is;
    }

    //escape Input
    function escapeInput($input){
        return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    }

    function filterInput($input, $method = INPUT_POST){
        return filter_input($method, $input, FILTER_DEFAULT);
    }

    //upload image
    function uploadImg($session,$post,$file,$directory = './img/vehicle/'){
        
        $uploadDirectory = $directory;

        $_SESSION[$session] = isset($_POST[$post]) ? escapeInput($_POST[$post]) : false;

        $_SESSION[$session] = isset($_FILES[$file]) ? escapeInput($_FILES[$file]["error"]) : false;

        if ($_SESSION[$session] == UPLOAD_ERR_OK){

            $_SESSION[$session] = isset($_FILES[$file]) ? escapeInput($_FILES[$file]["name"]) : false;
            $sourceFile = isset($_FILES[$file]) ? escapeInput($_FILES[$file]["tmp_name"]) : false;
            $destinationFile = $uploadDirectory . basename($_SESSION[$session]);
            unset($_FILES[$file]);

        }else{

            echo "<script>alert('Aucune image n\'a été sélectionnée ou une erreur s_'est produite.');</script>";
            return false;
            
        }

        if(move_uploaded_file($sourceFile, $destinationFile)){
            
            return true;

        }else{

            return false;
        
        }

    }

    // Rerouted if the page is inaccessible for the current user
    function pageUnavailable(){
            
        if($_SESSION['local']){

            echo '<script>window.location.href = "http://garageparrot/index.php?page=error_page";</script>';
        
        }else{

            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=error_page";</script>';

        }
        exit();
        
    }

    // Rerouted if page does not exist 
    function unknownPage(){
            
        if($_SESSION['local']){
            
            echo '<script>window.location.href = "http://garageparrot/index.php?page=unknownPage";</script>';
        
        }
        else{
            
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=unknownPage";</script>';
        
        }
        exit();
        
    }

    // Rerouted if page does not exist 
    function timeExpired(){
            
        if($_SESSION['local']){
            
            echo '<script>window.location.href = "http://garageparrot/index.php?page=timeExpired";</script>';
        
        }
        else{
            
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=timeExpired";</script>';
        
        }
        exit();
        
    }

    // Route to home page
    function routeToHomePage(){
            
        if($_SESSION['local']){
            
            echo '<script>window.location.href = "http://garageparrot/index.php?page=home";</script>';
        

        }else{

            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=home";</script>';

        }
        exit();
    }

    // Route to user page
    function routeToUserPage(){
        if($_SESSION['local']){

            echo '<script>window.location.href = "http://garageparrot/index.php?page=user";</script>';
        
        }
        else{
            
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=user";</script>';
        
        }
        exit();
    }

    // Route to carEdit page
    function routeToCarEditPage(){
        if($_SESSION['local']){

            echo '<script>window.location.href = "http://garageparrot/index.php?page=carEdit";</script>';
        
        }
        else{
            
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=carEdit";</script>';
        
        }
        exit();
    }

    // Route to car page
    function routeToCarPage(){
        if($_SESSION['local']){

            echo '<script>window.location.href = "http://garageparrot/index.php?page=car";</script>';
        
        }
        else{
            
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=car";</script>';
        
        }
        exit();
    }

    // Route to disconnect page
    function routeToDisconnectPage(){
        if($_SESSION['local']){

            echo '<script>window.location.href = "http://garageparrot/index.php?page=disconnect";</script>';
        
        }
        else{
            
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=disconnect";</script>';
        
        }
        exit();
    }

    // Route to disconnect page
    function returnNewError(){
        if($_SESSION['local']){

            echo '<script>window.location.href = "http://garageparrot/index.php?page=user_edit&newError=true";</script>';

        }else{

            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=user_edit&newError=true";</script>';

        }
        exit();
    }

    // Route after delete
    function routeAfterDelete(){

        if($_SESSION['typeConnect'] === 'Administrator'){

            routeToUserPage();

        }else{

            routeToDisconnectPage();
            
        }
    }

?>