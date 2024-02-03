<?php
	if (isset($_POST['envoyer'])) {

        $myEmail = $_POST["email"];
        $myPw = $_POST["password"];

        echo $myEmail . ' , ' . $myPw;
    }
?>
