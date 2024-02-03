<section class="section__connexion">
    <form class="form__connexion" action="/index.php?page=connexion" method="post">
        <fieldset class="fieldset__connexion">
            <legend >Connexion</legend>
            <fieldset class="fieldset__email">
                <legend class="legend__connexion">email</legend>
                <input class="email__connexion" type="email" name="email" placeholder="Saisissez votre email">
            </fieldset>
            <fieldset class="fieldset__password">
                <legend class="legend__connexion">mot de passe</legend>
                <input class="password__connexion" type="password" name="password" placeholder="Saisissez votre mot de passe">
            </fieldset>
                <input class="button__connexion" type="submit" name="envoyer" value="ok">
        </fieldset>
    </form>
    <p class="para_pw--oublie"><a class="link_pw--oublie" href="/index.php?page=connexion">Mot de passe oublié ?</a></p>
</section>

<?php

    include_once('../Controller/page.controller.php');
    $MyPage = new Page();
    //include("../Controller/ConfigConnBdEssensed.php");
    include("../Controller/ConfigConnGp.php");

    include_once('../Model/userConnect.class.php');
    $MyUserConnect = new userConnect();

    if (isset($_POST['envoyer'])) {
        if ($_POST["email"] != null && $_POST["password"] != null ) {
            $myEmail = $_POST["email"];
            $myPw = $_POST["password"];
            $resultat2 = $bdd->query("SELECT `pseudo` FROM `user` WHERE `email`='" . $myEmail . "'");
            $donnee_pseudo = $resultat2->fetch();
            $_SESSION['pseudoUser']=$donnee_pseudo;
            $resultat2 = $bdd->query("SELECT `password` FROM `user` WHERE `password`='" . $myPw . "'");
            $donnee_pw = $resultat2->fetch();
            $resultat2 = $bdd->query("SELECT `id_type` FROM `user` WHERE `email`='" . $myEmail . "'");
            $donnee_user_id = $resultat2->fetch();
            $resultat2 = $bdd->query("SELECT `type` FROM `user_type` WHERE `id_type`='" . intval($donnee_user_id['id_type']) . "'");
            $donnee_user = $resultat2->fetch();
            $MyUserConnect->SetUserConnect($donnee_user['type']);
            $_SESSION['connected'] = true;
        } else {
            $MyUserConnect->SetUserConnect('guest');
            $_SESSION['connected'] = false;
        }

        if($_SESSION['local']===true){
            echo '<script>window.location.href = "http://garageparrot/index.php?page=home";</script>';
        }
        else{
            echo '<script>window.location.href = "https://www.follaco.fr/gp/index.php?page=home";</script>';
        }
        exit();
    }
?>