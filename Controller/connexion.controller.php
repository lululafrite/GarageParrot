<?php

    if (isset($_POST['envoyer'])) {
        
        include_once('../model/connexion.class.php');
        include_once('../common/utilies.php');

        $email_ = isset($_POST['email']) ? filterInput('email') : '';
        $pw_ = isset($_POST['password']) ? filterInput('password') : '';
        
        if(!empty($email_) && !empty($pw_)){

            $MyUserConnect = new userConnect();
            $data = $MyUserConnect->queryConnect($email_,$pw_);

            if(!$data){
                
                $_SESSION['userConnected'] = 'Guest';
                $_SESSION['connexion'] = false;
                $_SESSION['message'] = 'CONNEXION IMPOSSIBLE!!!<br>Votre email ou votre<br>mot de passe sont incorrects!';
                
            }else{
                
                $_SESSION['userConnected'] = $data['type'];
                $_SESSION['pseudoUser'] = $data['pseudo'];
                $_SESSION['connexion'] = true;
                routeToHomePage();

            }

        }else{

            $_SESSION['userConnected'] = 'Guest';
            $_SESSION['connexion'] = false;
            $_SESSION['message'] = 'L\'un des champs est vide!!!<br>Saisissez email et mot de passe.';

        }

    }

?>