<?php
    
    if ($_SESSION['pseudoUser'] === "Guest") {
        if($_SESSION['local']===true){
            echo '<script>window.location.href = "http://garageparrot/index.php?page=error_page";</script>';
            header("Location: index.php?page=error_page");
            exit;
        }
        else{
            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=error_page";</script>';
            header("Location: https://www.follaco.fr/index.php?page=error_page");
            exit;
        }
        exit();
    }
    
    include('../model/connexion.class.php');
    $MyUserConnect = new userConnect();

    $MyUserConnect->SetUserConnect('Guest');
    $_SESSION['pseudoUser']="Guest";

    if($_SESSION['local']===true){
        echo '<script>window.location.href = "http://garageparrot/index.php?page=home";</script>';
        header("Location: index.php?page=home");
        exit;
    }
    else{
        echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=home";</script>';
        header("Location: https://www.follaco.fr/index.php?page=home");
        exit;
    }
?>
