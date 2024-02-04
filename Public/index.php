<?php

    xdebug_break();

    session_start();

    require '../vendor/autoload.php';
    
    if (!isset($_SESSION['userConnected'])) {
        $_SESSION['userConnected']='Guest';
        $_SESSION['pseudoUser']='Guest';
        $_SESSION['theTable']='car';
        $_SESSION['laPage']=1;
        $_SESSION['firstLine']=0;
        $_SESSION['ligneParPage']=4;
        $_SESSION['addCar']=false;
        $_SESSION['addUser']=false;
        $_SESSION['addOrder']=false;
        $_SESSION['errorFormUser']=false;
        $_SESSION['connexion']=false;
    }

    // La variable $_SESSION['local'] doit être changée manuellement : mettre à true si travail en local, sinon mettre à false.
    $_SESSION['local']=true;
    if ($_SESSION['local']=true){
        $_SESSION['db']='garage_parrot';
    }
    else{
        $_SESSION['db']='dbs12361402';
    }

    //$page = $_GET['page']?? 'home';
    //La syntaxe ci-dessus est équivalente celle ci-dessous
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    require '../Elements/_01_head.php';
?>

<body>

<?php
    require '../Elements/_02_header.php';
?>
<script>

    var pageTitle = document.title;

    if (window.location.href.includes("home")) {
        pageTitle = "Garage V.PARROT - Accueil";
    } else if (window.location.href.includes("user")) {
        pageTitle = "Garage V.PARROT - contacts";
    } else if (window.location.href.includes("user_edit")) {
        pageTitle = "Garage V.PARROT - Editer Contact";
    } else if (window.location.href.includes("car")) {
        pageTitle = "Garage V.PARROT - Nos occasions";
    } else if (window.location.href.includes("car_edit")) {
        pageTitle = "Garage V.PARROT - Editer occasion";
    } else if (window.location.href.includes("contact_us")) {
        pageTitle = "Garage V.PARROT - Nous contacter";
    } else if (window.location.href.includes("connexion")) {
        pageTitle = "Garage V.PARROT - connexion";
    } else if (window.location.href.includes("disconnect")) {
        pageTitle = "Garage V.PARROT - Déconnexion";
    } else if (window.location.href.includes("error_page")) {
        pageTitle = "Garage V.PARROT - Page inaccessible";
    } else if (window.location.href.includes("error_unknown_page")) {
        pageTitle = "Garage V.PARROT - Page inéxistante";
    } 

    document.getElementById("pageTitle").innerText = pageTitle;
    
</script>

<main>
    
    <?php
        if ($page === 'home'){
            require 'view/index.php';
        }elseif ($page === 'user'){
            require 'view/user.php';
        }elseif ($page === 'user_edit'){
            require 'view/user_edit.php';
        }elseif($page === 'car'){
            require 'view/car.php';
        }elseif ($page === 'car_edit'){
            require 'view/car_edit.php';
        }elseif ($page === 'contact_us'){
            require 'view/contact_us.php';
        }elseif ($page === 'connexion'){
            require 'view/connexion.php';
        }elseif ($page === 'disconnect'){
            require 'view/disconnect.php';
        }elseif ($page === 'error_page'){
            require 'view/error_access_page.php';
        }elseif ($page === 'error_unknown_page'){
            require 'view/error_unknown_page.php';
        }elseif($page === '404'){
            require 'view/error_unknown_page.php';
        }else {
            require 'view/error_unknown_page.php';
        }
    ?>
</main>

<?php
    require '../Elements/_04_footer.php';
    $_SESSION['NextOrPrevious'] = false;
?>

<!-- -------- FILE ASSET JAVASCRIPT FOR BOOTSTRAP (STANDARD AND POPPER) --------- -->
<!-- <script src="assets/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->

<!-- ----------- CND JAVASCRIPT FOR BOOTSTRAP (STANDARD AND POPPER) ------------- -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->

<!-- ----------------- CND JAVASCRIPT FOR BOOTSTRAP (POPPER) -------------------- -->
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script> -->

<!-- ----------------- CND JAVASCRIPT FOR BOOTSTRAP (STANDARD) ------------------ -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>