<?php
    
    if ($user === "guest") {
        if($_SESSION['local']===true){
            echo '<script>window.location.href = "http://garageparrot/index.php?page=error_page";</script>';
        }
        else{
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=error_page";</script>';
        }
        exit();
    }
    
    include_once('../Model/userConnect.class.php');
    $MyUserConnect = new userConnect();
    
    /*include_once('../Controller/page.controller.php');
    $MyPage = new Page();*/

    $MyUserConnect->SetUserConnect('guest');

    if($_SESSION['local']===true){
        echo '<script>window.location.href = "http://garageparrot/index.php?page=home";</script>';
    }
    else{
        echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=home";</script>';
    }
?>
