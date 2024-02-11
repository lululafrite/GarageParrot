<div class="d-flex justify-content-center">
    <form action="index?page=image" method="post" enctype="multipart/form-data">
        <div class="d-flex flex-column justify-content-center m-3">  
            <div>  
                <input class="fs-4" type="file" name="fileInput" id="fileInput" accept="image/jpeg, image/png, image/webp" directory="./img/vehicle/">
            </div>
            <div class="d-flex justify-content-center">
                <input class="btn btn-lg btn-primary fs-4 mt-3 me-3 w-50" type="submit" value="Télécharger">
                <a class="btn btn-lg btn-warning fs-4 w-50 mt-3" href="index.php?page=car_edit"  name="bt__carEdit--previous">Retour</a>
            </div>
        </div>
    </form>
</div>
<?php
    $uploadDirectory = './img/vehicle/';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES["fileInput"]) && $_FILES["fileInput"]["error"] == UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
            
            $fileType = mime_content_type($_FILES["fileInput"]["tmp_name"]);

            if (in_array($fileType, $allowedTypes)) {
                $sourceFile = $_FILES["fileInput"]["tmp_name"];
                $destinationFile = $uploadDirectory . basename($_FILES["fileInput"]["name"]);

                if (move_uploaded_file($sourceFile, $destinationFile)) {
                    echo "L'image a été uploadée avec succès.";
                } else {
                    echo "Désolé, une erreur s'est produite lors de l'upload de l'image.";
                }
            } else {
                echo "Le type de fichier n'est pas autorisé. Veuillez sélectionner une image JPEG, PNG ou WebP.";
            }
        } else {
            echo "Aucune image n'a été sélectionnée ou une erreur s'est produite.";
        }
    }
?>

        <!--<table>
            <tr>
                <td>
                    <input class="btn btn-lg btn-primary fs-4" type="file" name="fileInput" id="fileInput" accept="image/jpeg, image/png, image/webp" directory="./img/vehicle/">
                </td>
            </tr>
            <tr>
                <td class="d-flex colspan-2">
                    <input class="btn btn-lg btn-primary fs-4 w-50" type="submit" value="Télécharger">
                    <a class="btn btn-lg btn-warning fs-4 w-50" href="index.php?page=car_edit"  name="bt__carEdit--previous">Retour</a>
                </td>
            </tr>
        </table>-->