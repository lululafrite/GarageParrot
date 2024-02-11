<?php
//var_dump($_FILES["fileInput"]);
$uploadDirectory = './img/vehicle/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["fileInput"]) && $_FILES["fileInput"]["error"] == UPLOAD_ERR_OK) {
        $sourceFile = $_FILES["fileInput"]["tmp_name"];
        $destinationFile = $uploadDirectory . basename($_FILES["fileInput"]["name"]);

        if (move_uploaded_file($sourceFile, $destinationFile)) {
            echo "L'image a été uploadée avec succès.";
        } else {
            echo "Désolé, une erreur s'est produite lors de l'upload de l'image.";
        }
    } else {
        echo "Aucune image n'a été sélectionnée ou une erreur s'est produite.";
    }
}
?>
