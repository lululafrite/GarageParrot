<main>
    <?php

        $_SESSION['NextOrPrevious'] = false;
        
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        
        if ($page === 'home'){

            include_once 'view/home.php';

        }elseif ($page === 'user'){
            
            if($_SESSION['userConnected'] === 'Administrator'){
                
                include_once 'view/user.php';
            
            }else{
                
                pageUnavailable();

            }

        }elseif ($page === 'user_edit'){

            if($_SESSION['userConnected'] === 'Administrator'){
                
                include_once 'view/user_edit.php';

            }else{
                
                pageUnavailable();

            }

        }elseif($page === 'car'){

            if($_SESSION['userConnected'] === 'Administrator' || $_SESSION['userConnected'] === 'User'){
                
                include_once 'view/car_admin.php';

            }else{
                
                include_once 'view/car.php';

            }

        }elseif ($page === 'car_edit'){

            if($_SESSION['userConnected'] === 'Administrator' || $_SESSION['userConnected'] === 'User'){
                
                include_once 'view/car_edit.php';

            }else{
                
                pageUnavailable();

            }

        }elseif ($page === 'connexion'){

            include_once 'view/connexion.php';

        }elseif ($page === 'disconnect'){

            include_once 'view/disconnect.php';

        }elseif ($page === 'api'){

            include_once 'view/car.api.php';

        }elseif ($page === 'error_page'){

            include_once 'view/error_access_page.php';

        }elseif ($page === 'error_unknown_page'){

            include_once 'view/error_unknown_page.php';

        }elseif ($page === 'kanban'){

            include_once 'view/kanban.php';

        }elseif ($page === 'mokup'){

            include_once 'view/mokup.php';

        }else {

            include_once 'view/error_unknown_page.php';

        }
        
    ?>
</main>