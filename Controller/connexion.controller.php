<?php

    if (isset($_POST['envoyer'])) {
        
        include('../model/connexion.class.php');
        $MyUserConnect = new userConnect();

        if ($_POST["email"] != null && $_POST["password"] != null ) {

            try {
                
                $data = $MyUserConnect->queryConnect($_POST["email"],$_POST["password"]);
                
                $MyUserConnect->SetUserConnect($data['type']);
                $_SESSION['pseudoUser']=$data['pseudo'];
                
                $MyUserConnect->SetConnexion(true);

            }catch (Exception $e){
                
                echo "error in the query : " . $e->getMessage();
                $MyUserConnect->SetConnexion(false);

            }

        }else{

            $MyUserConnect->SetUserConnect('guest');
            $MyUserConnect->SetConnexion(false);

        }

        if($_SESSION['local']===true){

            echo '<script>window.location.href = "http://garageparrot/index.php?page=home";</script>';
            

        }else{

            echo '<script>window.location.href = "https://www.follaco.fr/index.php?page=home";</script>';

        }
        exit();

    }
?>
