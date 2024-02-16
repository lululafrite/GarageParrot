# Site web pour le GARAGE PARROT

******** MANUEL D'INSTALLATION ONLINE ET LOCAL ********

POUR TRAVAILLER EN LOCAL
1) Installez WAMPSERVER avec php 8.2 et mariadb 10.11.5
    - Assurez-vous que la base de données mariadb soit accéssible sur le port 3307
    - Configurez le fichier php.ini en utilisant le modèle tuto/php. Cette configuration est importante pour le téléchargement des images et pour activer xdebug.
2) Clonez le projet avec GIT dans le dossier wwww de wampserver 
3) Pour VS CODE, installer les extentions suivantes :
    - Composer
    - Mysql Autocomplete
    - php debug
    - php extension pack
    - php intelephense
    - symfony for VSCode
4) Configurez le fichier launch.json de VS Code
    - Référez-vous au fichier tuto/launch.txt
5) Base de données (mariadb)
    - Créer le schéma nommé 'garage_parrot'
    - Importer le fichier garage_parrot.sql dans votre schéma
    - Concervez un utilisateur 'root' sans mot de passe avec tous les privilèges
6) Agir sur le fichier Public/index.php
    Tout en haut du fichier Public/index.php :
    - Décommentez error_reporting(E_ALL);
    - Décommentez ini_set('display_errors', 'On');
    - Décommentez xdebug_break();
    - Passez la variable $_SESSION['local'] à true. Exemple : $_SESSION['local']=true; Cette variable agit sur le controleur 'ConfigConnGP.php' pour les paramètres de connexion (true pour local et false pour online).


POUR TRAVAILLER ONLINE
1) Agir sur le fichier Public/index.php
    Tout en haut du fichier Public/index.php :
    - Commentez //error_reporting(E_ALL);
    - Commentez //ini_set('display_errors', 'On');
    - Commentez //xdebug_break();
    - Passez la variable $_SESSION['local'] à false. Exemple : $_SESSION['local']=true; Cette variable agit sur le controleur 'ConfigConnGP.php' pour les paramètres de connexion (true pour local et false pour online).
2) Utilisateur de la Base de données
    - Produire un utilisateur possédant tous les privilèges avec un nom différent de root et un mot de passe sécurisé.
3) Uploadez le projet sur le serveur online
    - Avec filezilla, updoadez les dossiers et fichier disponible dans github
    https://github.com/lululafrite/GarageParrot.git
    git clone https://github.com/lululafrite/GarageParrot.git