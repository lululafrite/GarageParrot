<?php
    include('../Controller/userEdit.controller.php');
?>

<section class="container">

    <form action="" method="post" id="formUserEdit" enctype="multipart/form-data">
                
        <table class="w-100">

            <tr class="m-0 p-0">
                <td class="m-0 p-0 pb-5">
                </td>
                <td class="d-flex flex-column flex-sm-row m-0 p-0 pb-5">
                    <div class="pe-2 pb-2 pb-sm-0">
                        <button type="submit" class="btn btn-lg btn-warning fs-4" id="bt_userEdit_cancel" name="bt_userEdit_cancel" style="width: 100px;" onclick="retour();">Retour</button>
                        <button type="submit" class="btn btn-lg btn-success fs-4" id="bt_userEdit_save" name="bt_userEdit_save" style="width: 100px;">Enregistrer</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-info fs-4" id="bt_userEdit_new" name="bt_userEdit_new" style="width: 100px;">Nouveau</button>
                        <button type="submit" class="btn btn-lg btn-danger fs-4" id="bt_userEdit_delete" name="bt_userEdit_delete" style="width: 100px;">Supprimer</button>
                    </div>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_userEdit_id">ID</label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3" id="txt_userEdit_id" name="txt_userEdit_id" type="text" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyUser->getId())){
                                echo $MyUser->getId();
                            }else{
                                echo $Users[0]['id_user'];
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
                    <label class="form-control-lg m-0 mb-2 p-0">
                        Numéro d'identifiant. Ce numèro est incrémenté automatiquement par la robot.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_userEdit_name">Nom<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_userEdit_name" name="txt_userEdit_name" type="text" placeholder="Saisissez votre NOM" style="font-size: 1.6rem;" oninput="validateInput('txt_userEdit_name','','labelMessageName','Saisissez votre Nom d\'une longueur de 50 caractères maximum.')"
                        value=
                        "<?php
                            echo $Users[0]['name'];
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageName">
                        Saisissez le Nom (50 caractères maximum).
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_userEdit_surname">Prénom<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_userEdit_surname" name="txt_userEdit_surname" type="text" placeholder="Saisissez votre Prénom" style="font-size: 1.6rem;" oninput="validateInput('txt_userEdit_surname','','labelMessageSurname','Saisissez votre Prénom d\'une longueur de 50 caractères maximum.')"
                        value=
                        "<?php
                            echo $Users[0]['surname'];
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageSurname">
                        Saisissez le Prénom (50 caractères maximum).
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_userEdit_pseudo">Pseudo<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_userEdit_pseudo" name="txt_userEdit_pseudo" type="text" placeholder="Saisissez votre Pseudo" style="font-size: 1.6rem;" oninput="validateInput('txt_userEdit_pseudo','','labelMessagePseudo','Saisissez votre pseudonyme d\'une longueur de 20 caractères maximum.')"
                    value=
                        "<?php
                            echo $Users[0]['pseudo'];
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessagePseudo" name="labelMessagePseudo">
                        Saisissez le pseudonyme (20 caractères maximum).
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_userEdit_email">Email<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_userEdit_email" name="txt_userEdit_email" type="email" placeholder="Saisissez votre courriel" style="font-size: 1.6rem;" oninput="validateInput('txt_userEdit_email','','labelMessageEmail','Saisissez votre adresse de courriel d\'une longueur maximum de 255 caractères.')"
                        value=
                        "<?php
                            echo $Users[0]['email'];
                        ?>"
                    > 
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageEmail" name="labelMessageEmail">
                        Saisissez l'adresse email (255 caractères maximum).
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_userEdit_phone">Phone<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_userEdit_phone" name="txt_userEdit_phone" type="tel" placeholder="## ## ## ## ##" style="font-size: 1.6rem;" oninput="validateInput('txt_userEdit_phone','','labelMessagePhone','Saisissez votre N° de téléphone.')"
                        value=
                        "<?php
                            echo $Users[0]['phone'];
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessagePhone" name="labelMessagePhone">
                        Saisissez le N° de téléphone.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="list_userEdit_type">Utilisateur<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input list="datalist_userEdit_type" name="list_userEdit_type" id="list_userEdit_type" class="form-control-lg m-0 p-0 ps-3 border border-black fs-4" placeholder="Selectionnez un type" oninput="validateInput('list_userEdit_type','datalist_userEdit_type','labelMessageType','Selectionnez le type d\'utilisateur dans la liste de choix.')"
                        value=
                        "<?php
                            echo $Users[0]['type'];
                        ?>"
                    >
                    <datalist id="datalist_userEdit_type">
                        <?php
                            for($i=0;$i != count($MyType)-1;$i++) { ?>
                            <option value="<?php echo $MyType[$i]['type']; ?>">
                        <?php } ?>
                    </datalist>
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageType" name="labelMessageType">
                        Selectionnez le type d'utilisateur dans la liste de choix.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_userEdit_password">Mot de passe<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_userEdit_password" name="txt_userEdit_password" type="password" placeholder=""style="font-size: 1.6rem;" oninput="validateInput('txt_userEdit_password','','labelMessagePassword','Saisissez un mot de passe de 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants \/\*-.!?@')"
                        value=
                        "<?php
                            echo $Users[0]['password'];
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessagePassword"  name="labelMessagePassword">
                        Saisissez un mot de passe de 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants /*-.!?@
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt_userEdit_confirm">
                        Confirmation<span style="color:red;">*</span>
                    </label>
                </td>
                <td class="m-0 p-0 w-90">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt_userEdit_confirm" name="txt_userEdit_confirm" type="password" placeholder="" style="font-size: 1.6rem;" oninput="validateInput('txt_userEdit_confirm','','labelMessageConfirm','Le mot de passe de confirmation doit-être équivalent au mot de passe.')"
                        value=
                        "<?php
                            echo $Users[0]['password'];
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageConfirm" name="labelMessageConfirm">
                        Confirmez le mot de passe.
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="m-0 p-0 pb-5">
                </td>
                <td class="d-flex flex-column flex-sm-row m-0 p-0 pb-5">
                    <div class="pe-2 pb-2 pb-sm-0">
                        <button type="submit" class="btn btn-lg btn-warning fs-4" id="bt_userEdit_cancel" name="bt_userEdit_cancel" style="width: 100px;" onclick="retour();">Retour</button>
                        <button type="submit" class="btn btn-lg btn-success fs-4" id="bt_userEdit_save" name="bt_userEdit_save" style="width: 100px;">Enregistrer</button>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-lg btn-info fs-4" id="bt_userEdit_new" name="bt_userEdit_new" style="width: 100px;">Nouveau</button>
                        <button type="submit" class="btn btn-lg btn-danger fs-4" id="bt_userEdit_delete" name="bt_userEdit_delete" style="width: 100px;">Supprimer</button>
                    </div>
                </td>
            </tr>

        </table>

    </form>

</section>

<script>
    //Permet de remplir les input avec une valeur quelquonque. Utile si l'on a cliqué sur le bouton nouveau et que l'on veut annuler. 
    function retour() {        
        setInputValue('txt_userEdit_name', '_');
        setInputValue('txt_userEdit_surname', '_');
        setInputValue('txt_userEdit_pseudo', '_');
        setInputValue('txt_userEdit_email', 'user@gmail.com');
        setInputValue('txt_userEdit_phone', '00 00 00 00 00');
        setInputValue('list_userEdit_type', 'User');
        setInputValue('txt_userEdit_password', 'Abc123/*-');
        setInputValue('txt_userEdit_confirm', 'Abc123/*-');

        return;
    }
    function setInputValue(inputId, value) {
        const monInput = document.getElementById(inputId);
        if (monInput) {
            monInput.value = value;
        }
    }

    //Initialise les couleurs input list
    document.addEventListener('DOMContentLoaded', function() {
        var myInput = document.getElementById('list_userEdit_type');
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

        }else if(input === 'txt_userEdit_password'){

            var passwordInput = document.getElementById(input).value;

            // Vérifier que la longueur est de 8 caractères
            if (passwordInput.length < 8) {
                //alert("Le mot de passe doit contenir au moins 8 caractères dont au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial parmi les suivants (_-/*-@!)");
                isError=true;
            }else{
                isError=false;
            }

            //Vérifier au moins une majuscule, une minuscule, un chiffre, et un caractère spécial
            var regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[_\-/*-@!])[\w\-/*-@!]{8,255}$/;
            
            if (!regex.test(passwordInput)) {
                //alert("Le mot de passe doit contenir au moins 8 caractères dont au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial parmi les suivants (_-/*-@!)");
                isError=true;
            }
            
        }else if(input === 'txt_userEdit_confirm'){

            var password = document.getElementById('txt_userEdit_password').value;
            var passwordConfirm = document.getElementById(input).value;

            if(passwordConfirm === password){
                isError=false;
                console.log(isError);
            }
            else{
                isError=true;
                console.log(isError);
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

    document.getElementById('formUserEdit').addEventListener('submit', function (event) {

        var MessageName = "Saisissez le Nom (50 caractères maximum).";
        var MessageSurname = "Saisissez le Prénom (50 caractères maximum).";
        var MessagePseudo = "Saisissez le pseudonyme (20 caractères maximum).";
        var MessageEmail = "Saisissez l'adresse email (255 caractères maximum).";
        var MessagePhone = "Saisissez le N° de téléphone.";
        var MessageType = "Selectionnez le type d'utilisateur dans la liste de choix.";
        var MessagePassword = "Saisissez un mot de passe de 255 caractères maximum et 8 caractères minimun comprenant au moins : 1 minuscule, 1 majuscule, 1 chiffre et 1 caractère spéciale parmi les suivants /*-.!?@";
        
        var isError = false;
        
        if (!validateInput('txt_userEdit_name', '', 'labelMessageName', MessageName)){
            isError = true;
        }
        
        if (!validateInput('txt_userEdit_surname', '', 'labelMessageSurname', MessageSurname)){
            isError = true;
        }

        if (!validateInput('txt_userEdit_pseudo', '', 'labelMessagePseudo', MessagePseudo)) {
            isError = true;
        }

        if (!validateInput('txt_userEdit_email', '', 'labelMessageEmail', MessageEmail)) {
            isError = true;
        }

        if (!validateInput('txt_userEdit_phone', '', 'labelMessagePhone', MessagePhone)) {
            isError = true;
        }

        if (!validateInput('list_userEdit_type', 'datalist_userEdit_type', 'labelMessageType', MessageType)) {
            isError = true;
        }

        if (!validateInput('txt_userEdit_password', '', 'labelMessagePassword', MessagePassword)) {
            isError = true;
        }

        if (!validateInput('txt_userEdit_confirm', '', 'labelMessageConfirm', MessagePassword)) {
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
