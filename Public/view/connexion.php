<?php include_once('../Controller/connexion.controller.php'); ?>

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

            <input class="button__connexion" type="submit" name="envoyer" id="envoyer" value="ok">
        </fieldset>

    </form>

    <p class="para_pw--oublie"><a class="link_pw--oublie" href="/index.php?page=connexion">Mot de passe oublié ?</a></p>

</section>