<?php
    
    if ($user === "Guest") {
        if($_SESSION['local']===true){
            echo '<script>window.location.href = "http://garageparrot/index.php?page=error_page";</script>';
        }
        else{
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=error_page";</script>';
        }
        exit();
    }
    
    include_once('../Model/connexion.class.php');
    $MyUserConnect = new userConnect();
    
    /*include_once('../Controller/page.controller.php');
    $MyPage = new Page();*/

    $MyUserConnect->SetUserConnect('Guest');
    $_SESSION['pseudoUser']="Guest";

    if($_SESSION['local']===true){
        echo '<script>window.location.href = "http://garageparrot/index.php?page=home";</script>';
    }
    else{
        echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=home";</script>';
    }
?>
