<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    
    xdebug_break();

    session_start();

    include_once '../vendor/autoload.php';
    
    if (!isset($_SESSION['userConnected'])) {
        
        $_SESSION['userConnected'] = 'Guest';
        $_SESSION['pseudoUser'] = 'Guest';
        $_SESSION['connexion'] = false;

        $_SESSION['laPage'] = 1;
        $_SESSION['firstLine'] = 0;
        $_SESSION['ligneParPage'] = 3;
        $_SESSION['nbOfPage'] = 1;
        $_SESSION['NextOrPrevious'] = false;

        $_SESSION['theTable'] = 'car';

        $_SESSION['addCar'] = false;
        $_SESSION['newCar'] = false;
        $_SESSION['errorFormCar'] = false;
        $_SESSION['carBrand'] = '_';
        $_SESSION['carModel'] = '_';
        $_SESSION['carMotorization'] = '_';
        $_SESSION['carSold'] = 'Oui';
        $_SESSION['uploadImage1'] = '_.png';
        $_SESSION['uploadImage2'] = '_.png';
        $_SESSION['uploadImage3'] = '_.png';
        $_SESSION['uploadImage4'] = '_.png';
        $_SESSION['uploadImage5'] = '_.png';
        //Variable critères de recharche car
        $_SESSION['criteriaBrand'] = 'Selectionnez une marque';
        $_SESSION['criteriaModel'] = 'Selectionnez un modele';
        $_SESSION['criteriaMileage'] = 'Selectionnez un kilometrage maxi';
        $_SESSION['criteriaPrice'] = 'Selectionnez un prix maxi';

        $_SESSION['addBrand'] = false;
        $_SESSION['addModel']=false;
        $_SESSION['addMotorization']=false;

        $_SESSION['addUser'] = false;
        $_SESSION['newUser'] = false;
        $_SESSION['userType'] = '_';
        $_SESSION['errorFormUser'] = false;
        //Variable critères de recharche user
        $_SESSION['criteriaName'] = '';
        $_SESSION['criteriaPseudo'] = '';
        $_SESSION['criteriaType'] = 'Selectionnez un type';

        $_SESSION['whereClause'] = 1;

        $_SESSION['local']=true;
        $_SESSION['timeZone']="Europe/Paris";
    }

    // La variable $_SESSION['local'] doit être changée manuellement : mettre à true si travail en local, sinon mettre à false.
    $_SESSION['local']=true;

    //$page = $_GET['page']?? 'home';
    //La syntaxe ci-dessus est équivalente celle ci-dessous
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    include_once '../Elements/_01_head.php';
?>

<body>

<?php
    include_once '../Elements/_02_header.php';
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
    } else if (window.location.href.includes("image")) {
        pageTitle = "Garage V.PARROT - Charger image";
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
            include_once 'view/index.php';
        }elseif ($page === 'user'){
            include_once 'view/user.php';
        }elseif ($page === 'user_edit'){
            include_once 'view/user_edit.php';
        }elseif($page === 'car'){
            require_once 'view/car.php';
        }elseif ($page === 'car_edit'){
            include_once 'view/car_edit.php';
        }elseif ($page === 'image'){
            include_once 'view/image.php';
        }elseif ($page === 'upload'){
            include_once 'view/upload.php';
        }elseif ($page === 'contact_us'){
            include_once 'view/contact_us.php';
        }elseif ($page === 'connexion'){
            include_once 'view/connexion.php';
        }elseif ($page === 'disconnect'){
            include_once 'view/disconnect.php';
        }elseif ($page === 'error_page'){
            include_once 'view/error_access_page.php';
        }elseif ($page === 'error_unknown_page'){
            include_once 'view/error_unknown_page.php';
        }elseif($page === '404'){
            include_once 'view/error_unknown_page.php';
        }else {
            include_once 'view/error_unknown_page.php';
        }
    ?>
</main>

<?php
    include_once '../Elements/_04_footer.php';
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


</body>

</html>