<?php
    include('../Controller/carEdit.controller.php');
?>

<section class="container">

    <form action="" method="post" id="formCarEdit" enctype="multipart/form-data">

        <table class="w-100">

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_carEdit_id">ID</label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg bg-light m-0 p-0 ps-3" id="txt_carEdit_id" name="txt_carEdit_id" type="text" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyCar->getId())){
                                echo $MyCar->getId();
                            }else{
                                echo $Cars[0]['id_car'];
                            }
                            
                        ?>"
                        aria-label="Disabled input example" readonly
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageId">
                        Identifiant de l'annonce. Ce numèro est incrémenté automatiquement par la robot.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="list_carEdit_brand">Marque<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input list="datalist_carEdit_brand" name="list_carEdit_brand" id="list_carEdit_brand" class="form-control-lg m-0 p-0 ps-3 border border-black fs-4" placeholder="Selectionnez une marquer" oninput="validateInput('list_carEdit_brand','datalist_carEdit_brand','labelMessageBrand','Veuillez selectionner une valeur existante.')"
                        value=
                        "<?php
                            echo $Cars[0]['brand'];
                        ?>"
                    >
                    <datalist id="datalist_carEdit_brand">
                        <?php
                            for($i=0;$i != count($MyBrand)-1;$i++) { ?>
                            <option value="<?php echo $MyBrand[$i]['name']; ?>">
                        <?php } ?>
                    </datalist>
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageBrand">
                        Veuillez selectionner une marque dans la liste de choix.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="list_carEdit_model">Modèle<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input list="datalist_carEdit_model" name="list_carEdit_model" id="list_carEdit_model" class="form-control-lg m-0 p-0 ps-3 border border-black fs-4" placeholder="Selectionnez un modèle" oninput="validateInput('list_carEdit_model','datalist_carEdit_model','labelMessageModel','Veuillez selectionner une valeur existante.')"
                        value=
                        "<?php
                            echo $Cars[0]['model'];
                        ?>"
                    >
                    <datalist id="datalist_carEdit_model">
                        <?php for($i=0;$i != count($MyModel)-1;$i++) { ?>
                            <option value="<?php echo $MyModel[$i]['name']; ?>">
                        <?php } ?>
                    </datalist>
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageModel">
                        Veuillez selectionner un modèle dans la liste de choix.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="list_carEdit_motorization">Motorization<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input list="datalist_carEdit_motorization" name="list_carEdit_motorization" id="list_carEdit_motorization" class="form-control-lg m-0 p-0 ps-3 border border-black fs-4" placeholder="Selectionnez un motorization" oninput="validateInput('list_carEdit_motorization','datalist_carEdit_motorization','labelMessageMotorization','Veuillez selectionner une valeur existante.')"
                        value=
                        "<?php
                            echo $Cars[0]['motorization'];
                        ?>"
                    >
                    <datalist id="datalist_carEdit_motorization">
                        <?php for($i=0;$i != count($MyMotorization)-1;$i++) { ?>
                            <option value="<?php echo $MyMotorization[$i]['name']; ?>">
                        <?php } ?>
                    </datalist>
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageMotorization">
                        Veuillez selectionner une motorisation dans la liste de choix.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_carEdit_year">Année<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_carEdit_year" name="txt_carEdit_year" type="text" placeholder="Saisissez l'année de 1er mise en circulation" style="font-size: 1.6rem;" oninput="validateInput('txt_carEdit_year','','labelMessageYear','Veuillez saisir l\'année (à 4 chiffres) de 1er mise en circulation.')"
                        value=
                        "<?php
                            echo $Cars[0]['year'];
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageYear">
                        Saisissez l'année (à 4 chiffres) de 1er mise en circulation.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_carEdit_mileage">Kilomètrage<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_carEdit_mileage" name="txt_carEdit_mileage" type="text" placeholder="Saisissez l'année de 1er mise en circulation" style="font-size: 1.6rem;" oninput="validateInput('txt_carEdit_mileage','','labelMessageMileage','Saisissez le kilomètrage (uniquement des chiffres).')"
                        value=
                        "<?php
                            echo $Cars[0]['mileage'];
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageMileage">
                        Saisissez le kilomètrage (uniquement des chiffres).
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_carEdit_price">Prix<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_carEdit_price" name="txt_carEdit_price" type="text" placeholder="Saisissez le prix" style="font-size: 1.6rem;" oninput="validateInput('txt_carEdit_price','','labelMessagePrice','Saisissez le prix (uniquement des chiffres).')"
                        value=
                        "<?php
                            echo $Cars[0]['price'];
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessagePrice">
                        Saisissez le prix (uniquement des chiffres).
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="list_carEdit_sold">Disponible<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input list="datalist_carEdit_sold" name="list_carEdit_sold" id="list_carEdit_sold" class="form-control-lg m-0 p-0 ps-3 border border-black fs-4" placeholder="Selectionnez Oui ou Non" oninput="validateInput('list_carEdit_sold','datalist_carEdit_sold','labelMessageSold','Selectionnez Oui ou Non pour indiquer la disponibilité')"
                        value=
                        "<?php
                            echo $Cars[0]['sold'];
                        ?>"
                    >
                    <datalist id="datalist_carEdit_sold">
                        <option value="Oui">
                        <option value="Non">
                    </datalist>
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageSold">
                        Selectionnez Oui ou Non dans la liste de choix pour indiquer la disponibilité.
                    </label>
                </td>
            </tr>
            
            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_carEdit_image1">Image1<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <div class="d-flex flex-column flex-xl-row">
                        <div class="d-flex align-items-center w-100 w-lg-50">
                            <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_carEdit_image1" name="txt_carEdit_image1" type="text" placeholder="Saisissez le nom de l'image" style="font-size: 1.6rem;" oninput="validateInput('txt_carEdit_image1','','labelMessageImage1','Saisissez le nom de l\'image (sans caractères spéciaux sauf - et _) aux formats *.png ou *.jpg ou *.webp. Sinon, téléchargez une image depuis votre disque local. ATTENTION!!! Dimmentions image1 au ratio de 350px sur 180px.')"
                                value=
                                "<?php
                                    echo $Cars[0]['image1'];
                                ?>"
                            >
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-start align-items-center m-0 mt-1 ms-xl-2 p-0 w-100">
                            <div class="d-flex align-items-center m-0 p-0 w-75">
                                <input class="fs-4" type="file" name="fileInput1" id="fileInput1" accept="image/jpeg, image/png, image/webp" directory="./img/vehicle/">
                            </div>
                            <div class="d-flex align-items-center m-0 mt-sm-1 p-0 w-25">
                                <input class="btn btn-lg btn-primary fs-4" type="submit" name="btn_image1" id="btn_image1" value="Télécharger">
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageImage1">
                        Saisissez le nom de l'image (sans caractères spéciaux sauf - et _) aux formats png, jpg et webp. Sinon, téléchargez une image depuis votre disque local. ATTENTION!!! Dimmentions image1 au ratio de 350px sur 180px.
                    </label>
                </td>
            </tr>
            
            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_carEdit_image2">Image2<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <div class="d-flex flex-column flex-xl-row">
                        <div class="d-flex align-items-center w-100 w-lg-50">
                            <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_carEdit_image2" name="txt_carEdit_image2" type="text" placeholder="Saisissez le nom de l'image" style="font-size: 1.6rem;" oninput="validateInput('txt_carEdit_image2','','labelMessageImage2','Saisissez le nom de l\'image (sans caractères spéciaux sauf - et _) aux formats *.png ou *.jpg ou *.webp. Sinon, téléchargez une image depuis votre disque local.')"
                                value=
                                "<?php
                                    echo $Cars[0]['image2'];
                                ?>"
                            >
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-start align-items-center m-0 mt-1 ms-xl-2 p-0 w-100">
                            <div class="d-flex align-items-center m-0 p-0 w-75">
                                <input class="fs-4" type="file" name="fileInput2" id="fileInput2" accept="image/jpeg, image/png, image/webp" directory="./img/vehicle/">
                            </div>
                            <div class="d-flex align-items-center m-0 mt-sm-1 p-0 w-25">
                                <input class="btn btn-lg btn-primary fs-4" type="submit" name="btn_image2" id="btn_image2" value="Télécharger">
                            </div>
                        </div>
                    </div>
                </td>
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageImage2">
                        Saisissez le nom de l'image (sans caractères spéciaux sauf - et _) aux formats png, jpg et webp. Sinon, téléchargez une image depuis votre disque local.
                    </label>
                </td>
            </tr>
            
            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_carEdit_image3">Image3<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <div class="d-flex flex-column flex-xl-row">
                        <div class="d-flex align-items-center w-100 w-lg-50">
                            <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_carEdit_image3" name="txt_carEdit_image3" type="text" placeholder="Saisissez le nom de l'image" style="font-size: 1.6rem;" oninput="validateInput('txt_carEdit_image3','','labelMessageImage3','Saisissez le nom de l\'image (sans caractères spéciaux sauf - et _) aux formats *.png ou *.jpg ou *.webp. Sinon, téléchargez une image depuis votre disque local.')"
                                value=
                                "<?php
                                    echo $Cars[0]['image3'];
                                ?>"
                            >
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-start align-items-center m-0 mt-1 ms-xl-2 p-0 w-100">
                            <div class="d-flex align-items-center m-0 p-0 w-75">
                                <input class="fs-4" type="file" name="fileInput3" id="fileInput3" accept="image/jpeg, image/png, image/webp" directory="./img/vehicle/">
                            </div>
                            <div class="d-flex align-items-center m-0 mt-sm-1 p-0 w-25">
                                <input class="btn btn-lg btn-primary fs-4" type="submit" name="btn_image3" id="btn_image3" value="Télécharger">
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageImage3">
                        Saisissez le nom de l'image (sans caractères spéciaux sauf - et _) aux formats png, jpg et webp. Sinon, téléchargez une image depuis votre disque local.
                    </label>
                </td>
            </tr>

            
            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_carEdit_image4">Image4<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <div class="d-flex flex-column flex-xl-row">
                        <div class="d-flex align-items-center w-100 w-lg-50">
                            <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_carEdit_image4" name="txt_carEdit_image4" type="text" placeholder="Saisissez le nom de l'image" style="font-size: 1.6rem;" oninput="validateInput('txt_carEdit_image4','','labelMessageImage4','Saisissez le nom de l\'image (sans caractères spéciaux sauf - et _) aux formats *.png ou *.jpg ou *.webp. Sinon, téléchargez une image depuis votre disque local.')"
                                value=
                                "<?php
                                    echo $Cars[0]['image4'];
                                ?>"
                            >
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-start align-items-center m-0 mt-1 ms-xl-2 p-0 w-100">
                            <div class="d-flex align-items-center m-0 p-0 w-75">
                                <input class="fs-4" type="file" name="fileInput4" id="fileInput4" accept="image/jpeg, image/png, image/webp" directory="./img/vehicle/">
                            </div>
                            <div class="d-flex align-items-center m-0 mt-sm-1 p-0 w-25">
                                <input class="btn btn-lg btn-primary fs-4" type="submit" name="btn_image4" id="btn_image4" value="Télécharger">
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageImage4">
                        Saisissez le nom de l'image (sans caractères spéciaux sauf - et _) aux formats png, jpg et webp. Sinon, téléchargez une image depuis votre disque local.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_carEdit_image5">Image5<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <div class="d-flex flex-column flex-xl-row">
                        <div class="d-flex align-items-center w-100 w-lg-50">
                            <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_carEdit_image5" name="txt_carEdit_image5" type="text" placeholder="Saisissez le nom de l'image" style="font-size: 1.6rem;" oninput="validateInput('txt_carEdit_image5','','labelMessageImage5','Saisissez le nom de l\'image (sans caractères spéciaux sauf - et _) aux formats *.png ou *.jpg ou *.webp. Sinon, téléchargez une image depuis votre disque local.')"
                                value=
                                "<?php
                                    echo $Cars[0]['image5'];
                                ?>"
                            >
                        </div>
                        <div class="d-flex flex-column flex-md-row justify-content-start align-items-center m-0 mt-1 ms-xl-2 p-0 w-100">
                            <div class="d-flex align-items-center m-0 p-0 w-75">
                                <input class="fs-4" type="file" name="fileInput5" id="fileInput5" accept="image/jpeg, image/png, image/webp" directory="./img/vehicle/">
                            </div>
                            <div class="d-flex align-items-center m-0 mt-sm-1 p-0 w-25">
                                <input class="btn btn-lg btn-primary fs-4" type="submit" name="btn_image5" id="btn_image5" value="Télécharger">
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageImage5">
                        Saisissez le nom de l'image (sans caractères spéciaux sauf - et _) aux formats png, jpg et webp. Sinon, téléchargez une image depuis votre disque local.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <button type="submit" class="btn btn-lg btn-warning fs-4 px-2 mb-2" id="bt_carEdit_cancel" name="bt_carEdit_cancel" onclick="retour()" style="width: 100px;">Retour</button>
                    <button type="submit" class="btn btn-lg btn-success fs-4 px-2 mb-2" id="bt_carEdit_save" name="bt_carEdit_save" style="width: 100px;">Enregistrer</button>
                    <button type="submit" class="btn btn-lg btn-info fs-4 px-2 mb-2" id="bt_carEdit_new" name="bt_carEdit_new" style="width: 100px;">Nouveau</button>
                    <button type="submit" class="btn btn-lg btn-danger fs-4 px-2" id="bt_carEdit_delete" name="bt_carEdit_delete" onclick="confirmDelete()" style="width: 100px;">Supprimer</button>
                </td>
            </tr>

        </table>

    </form>

</section>

<script>

    function setInputValue(inputId, value) {
        const monInput = document.getElementById(inputId);
        if (monInput) {
            monInput.value = value;
        }
    }
//Permet de remplir les input avec une valeur quelquonque. Utile si l'on a cliqué sur le bouton nouveau et que l'on veut annuler. 
    function retour() {        
        setInputValue('list_carEdit_brand', '_');
        setInputValue('list_carEdit_model', '_');
        setInputValue('list_carEdit_motorization', '_');
        setInputValue('txt_carEdit_year', '2024');
        setInputValue('txt_carEdit_mileage', '0');
        setInputValue('txt_carEdit_price', '0');
        setInputValue('list_carEdit_sold', 'Oui');
        setInputValue('txt_carEdit_image1', '_.png');
        setInputValue('txt_carEdit_image2', '_.png');
        setInputValue('txt_carEdit_image3', '_.png');
        setInputValue('txt_carEdit_image4', '_.png');
        setInputValue('txt_carEdit_image5', '_.png');

        return;
    }

    document.addEventListener('DOMContentLoaded', function() {
        var myInput = document.getElementById('list_carEdit_brand');
        myInput.style.backgroundColor = '#DADADA';
        var myInput = document.getElementById('list_carEdit_model');
        myInput.style.backgroundColor = '#DADADA';
        var myInput = document.getElementById('list_carEdit_motorization');
        myInput.style.backgroundColor = '#DADADA';
        var myInput = document.getElementById('list_carEdit_sold');
        myInput.style.backgroundColor = '#DADADA';
    });

    //vérifier si la valeur saisie existe dans la liste de choix
    function validateInput(input , datalist, myLabel, myMessage){
        
        var myInput = document.getElementById(input);
        var errorMessage = document.getElementById(myLabel);
        var isError = false;
        
        if(datalist!=''){
            
            var myDatalist = document.getElementById(datalist);

            var isValid = Array.from(myDatalist.options).some(function(option) {
                return option.value === myInput.value;
            });

            if(!isValid){isError = true;}

        }else if(myInput.value.trim() === ''){
            
            isError = true;

        }else{

            if(input === 'txt_carEdit_year'){

                var isValidNumber = /^\d{4}$/.test(myInput.value);
                if(!isValidNumber){isError = true;}

            }else if(input === 'txt_carEdit_price' || input === 'txt_carEdit_mileage'){

                var isValidNumber = /^\d+$/.test(myInput.value);
                if(!isValidNumber){isError = true;}

            }else if(input === 'txt_carEdit_image1' ||
                     input === 'txt_carEdit_image2' ||
                     input === 'txt_carEdit_image3' ||
                     input === 'txt_carEdit_image4' ||
                     input === 'txt_carEdit_image5'){
                
                var isValidExtension = /\.(png|jpg|webp)$/i.test(myInput.value);
                var isValidCharacters = /^[a-zA-Z0-9_\-\.]+$/.test(myInput.value);

                if (!isValidExtension || !isValidCharacters){
                    isError = true;
                }
            }
        }

        if(isError){

            errorMessage.textContent = myMessage;
            errorMessage.style.color = 'red';
            myInput.style.background = '#FFB4B4';
            return false;

        }else{

            errorMessage.textContent = myMessage;
            errorMessage.style.color = '#000000';
            
            if(datalist!=''){
                myInput.style.background = '#DADADA';
            }else{
                myInput.style.background = '#ffffff';
            }

            return true;
        }
    }

    /*********************************************************************************************
    ****** Annuler la soumission du formulaire si une erreur subsiste dans l'un des champs *******
    *********************************************************************************************/

    document.getElementById('formCarEdit').addEventListener('submit', function (event) {

        var MessageBrand = "Selectionner une marque dans la liste de choix.";
        var MessageModel = "Selectionner un modèle dans la liste de choix.";
        var MessageMotorization = "Selectionner une motorization dans la liste de choix.";
        var MessageYear = "Saisissez l'année (à 4 chiffres) de 1er mise en circulation.";
        var MessageMileage = "Saisissez le kilomètrage (uniquement des chiffres).";
        var MessagePrice = "Saisissez le prix (uniquement des chiffres).";
        var MessageSold = "Selectionnez Oui ou Non dans la liste de choix pour indiquer la disponibilité";
        var MessageImage1 = "Saisissez le nom de l'image (sans caractères spéciaux sauf - et _) aux formats png, jpg et webp. Sinon, téléchargez une image depuis votre disque local. ATTENTION!!! Dimmentions image1 au ratio de 350px sur 180px.";
        var MessageImage = "Saisissez le nom de l'image (sans caractères spéciaux sauf - et _) aux formats png, jpg et webp. Sinon, téléchargez une image depuis votre disque local.";
        
        var isError = false;
        
        if (!validateInput('list_carEdit_brand', 'datalist_carEdit_brand', 'labelMessageBrand', MessageBrand)){
            isError = true;
        }
        
        if (!validateInput('list_carEdit_model', 'datalist_carEdit_model', 'labelMessageModel', MessageModel)){
            isError = true;
        }

        if (!validateInput('list_carEdit_motorization', 'datalist_carEdit_motorization', 'labelMessageMotorization', MessageMotorization)) {
            isError = true;
        }

        if (!validateInput('txt_carEdit_year', '', 'labelMessageYear', MessageYear)) {
            isError = true;
        }

        if (!validateInput('txt_carEdit_mileage', '', 'labelMessageMileage', MessageMileage)) {
            isError = true;
        }

        if (!validateInput('txt_carEdit_price', '', 'labelMessagePrice', MessagePrice)) {
            isError = true;
        }

        if (!validateInput('list_carEdit_sold', 'datalist_carEdit_sold', 'labelMessageSold', MessageSold)) {
            isError = true;
        }

        if (!validateInput('txt_carEdit_image1', '', 'labelMessageImage1', MessageImage1)) {
            isError = true;
        }

        if (!validateInput('txt_carEdit_image2', '', 'labelMessageImage2', MessageImage)) {
            isError = true;
        }

        if (!validateInput('txt_carEdit_image3', '', 'labelMessageImage3', MessageImage)) {
            isError = true;
        }

        if (!validateInput('txt_carEdit_image4', '', 'labelMessageImage4', MessageImage)) {
            isError = true;
        }

        if (!validateInput('txt_carEdit_image5', '', 'labelMessageImage5', MessageImage)) {
            isError = true;
        }
        
        var messageAlerte = 'Vous avez un ou plusieurs champs dont la valeur n\'est pas conforme. Veuillez vérifier et corriger le ou les champs concernés';
        
        if (isError === true){
            event.preventDefault();
            alert (messageAlerte)
            isError = false;
        }
    });

</script>