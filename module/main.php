<main>
    <?php

        include_once('../common/utilies.php');

        if (isset($_POST['next']) || isset($_POST['previous'])){
            include_once('../controller/page.controller.php');
        }
        
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        
        if ($page === 'home'){

            resetVariableCar();
            resetVariableUser();
            resetVariablePage();
            $_SESSION['message'] = '';
            
            include_once 'view/home.php';

        }elseif ($page === 'user' || $page === 'userBtn'){

            resetVariableCar();
            $_SESSION['message'] = '';
            
            if($_SESSION['userConnected'] === 'Administrator'){

                include_once('../module/searchUser.php');
                include_once 'view/user.php';

                if($page === 'userBtn'){
                }
            
            }else{
                
                pageUnavailable();

            }

        }elseif ($page === 'user_edit'){

            resetVariableCar();
            resetVariableUser();
            resetVariablePage();
            $_SESSION['message'] = '';

            if($_SESSION['userConnected'] === 'Administrator'){
                
                include_once 'view/user_edit.php';

            }else{
                
                pageUnavailable();

            }

        }elseif($page === 'car' || $page === 'carBtn' ){

            resetVariableUser();
            $_SESSION['message'] = '';

            if($_SESSION['userConnected'] === 'Administrator' || $_SESSION['userConnected'] === 'User'){
                
                include('../module/searchCarAdmin.php');
                include_once 'view/car_admin.php';
                
                if($page === 'carBtn'){
                }

            }else{
                
                include_once 'view/car.php';

            }

        }elseif ($page === 'car_edit'){

            resetVariableCar();
            resetVariableUser();
            resetVariablePage();
            $_SESSION['message'] = '';

            if($_SESSION['userConnected'] === 'Administrator' || $_SESSION['userConnected'] === 'User'){
                
                include_once 'view/car_edit.php';

            }else{
                
                pageUnavailable();

            }

        }elseif ($page === 'connexion'){

            resetVariableCar();
            resetVariableUser();
            resetVariablePage();

            include_once 'view/connexion.php';

        }elseif ($page === 'disconnect'){

            resetVariableCar();
            resetVariableUser();
            resetVariablePage();
            $_SESSION['message'] = '';

            include_once 'view/disconnect.php';

        }elseif ($page === 'api'){

            include_once 'view/car.api.php';

        }elseif ($page === 'error_page'){

            resetVariableCar();
            resetVariableUser();
            resetVariablePage();
            $_SESSION['message'] = '';

            include_once 'error/error_access_page.php';

        }elseif ($page === 'error_unknown_page'){

            resetVariableCar();
            resetVariableUser();
            resetVariablePage();
            $_SESSION['message'] = '';

            include_once 'error/error_unknown_page.php';

        }elseif ($page === 'kanban'){

            resetVariableCar();
            resetVariableUser();
            resetVariablePage();
            $_SESSION['message'] = '';

            include_once 'view/kanban.php';

        }elseif ($page === 'mokup'){

            resetVariableCar();
            resetVariableUser();
            resetVariablePage();
            $_SESSION['message'] = '';

            include_once 'view/mokup.php';

        }else {

            resetVariableCar();
            resetVariableUser();
            resetVariablePage();
            $_SESSION['message'] = '';

            include_once 'error/error_unknown_page.php';

        }

        $_SESSION['NextOrPrevious'] = false;

        
    ?>
</main>