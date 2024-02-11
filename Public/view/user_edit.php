<?php
    include('../Controller/userEdit.controller.php');
?>

<section class="container">

    <form action="" method="post" id="formUserEdit">
                
        <table class="w-100">

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt__user--id_">ID</label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3" id="txt__user--id_" name="txt__user--id" type="text" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyUser->getId())){
                                echo $MyUser->getId();
                            }else{
                                echo isset($inputId) ? $inputId : '';
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
                        <?php echo isset($MessageId) ? $MessageId : ''; ?>
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt--Name_User">Nom<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Name_User" name="txt--Name_User" type="text" placeholder="Saisissez votre NOM" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyUser->getName())){
                                echo strtoupper($MyUser->getName());
                            }else{
                                echo isset($inputName) ? $inputName : '';
                            }
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageName">
                        <?php echo isset($MessageName) ? $MessageName : ''; ?>
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt--Surname_User">Prénom<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Surname_User" name="txt--Surname_User" type="text" placeholder="Saisissez votre Prénom" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyUser->getSurname())){
                                echo ucfirst(strtolower($MyUser->getSurname()));
                            }else{
                                echo isset($inputSurname) ? $inputSurname : '';
                            }
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0" id="labelMessageSurname">
                        <?php echo isset($MessageSurname) ? $MessageSurname : ''; ?>
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt--Pseudo_User">Pseudo<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Pseudo_User" name="txt--Pseudo_User" type="text" placeholder="Saisissez votre Pseudo" style="font-size: 1.6rem;"
                    value=
                        "<?php
                            if(!empty($MyUser->getPseudo())){
                                echo $MyUser->getPseudo();
                            }else{
                                echo isset($inputPseudo) ? $inputPseudo : '';
                            }
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0">
                        <?php echo isset($MessagePseudo) ? $MessagePseudo : ''; ?>
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt--Email_User">Email<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Email_User" name="txt--Email_User" type="email" placeholder="Saisissez votre courriel" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyUser->getEmail())){
                                if(filter_var($MyUser->getEmail(), FILTER_VALIDATE_EMAIL)){
                                    echo $MyUser->getEmail();
                                }else{
                                    echo isset($inputEmail) ? $inputEmail : '';
                                }
                            }else{
                                echo isset($inputEmail) ? $inputEmail : '';
                            }
                        ?>"
                    > 
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0">
                        <?php echo isset($MessageEmail) ? $MessageEmail : ''; ?>
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt--Phone_User">Phone<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Phone_User" name="txt--Phone_User" type="tel" placeholder="## ## ## ## ##" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyUser->getPhone())){
                                echo $MyUser->getPhone();
                            }else{
                                echo isset($inputPhone) ? $inputPhone : '';
                            }
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0">
                        <?php echo isset($MessagePhone) ? $MessagePhone : ''; ?>
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="list--User_Type">Utilisateur<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <select class="form-control-lg m-0 p-0 ps-3 w-100 border border-black" id="list_User_Type" name="list_User_Type" style="font-size: 1.6rem;">
                        <?php
                            $valeurDefault = isset($_POST['list_User_Type']) ? htmlspecialchars($_POST['list_User_Type']) : '';
                            if (!empty($MyUser->getType())){
                                $valeurDefault = $MyUser->getType();
                                $_SESSION['userType'] = $MyUser->getType();
                            }
                            echo "<option value=\"$valeurDefault\">$valeurDefault</option>";
                        ?>
                    <option value="Administrator">Administrator</option>
                    <option value="Customer">Customer</option>
                    <option value="Guest">Guest</option>
                    <option value="User">User</option>
                    <!-- </datalist> -->
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0">
                        <?php echo isset($MessageType) ? $MessageType : ''; ?>
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt--Password_User">Mot de passe<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Password_User" name="txt--Password_User" type="password" placeholder=""style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyUser->getPassword())){
                                echo $MyUser->getPassword();
                            }else{
                                echo isset($inputPassword) ? $inputPassword : '';
                            }
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0">
                        <?php echo isset($MessagePassword) ? $MessagePassword : ''; ?>
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt--Confirm_User">
                        Confirmation<span style="color:red;">*</span>
                    </label>
                </td>
                <td class="m-0 p-0 w-90">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Confirm_User" name="txt--Confirm_User" type="password" placeholder="" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyUser->getPassword())){
                                echo $MyUser->getPassword();
                            }else{
                                echo isset($inputConfirm) ? $inputConfirm : '';
                            }
                        ?>"
                    >
                </td>
            </tr>

            <tr>
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <label class="form-control-lg m-0 mb-2 p-0">
                        <?php echo isset($MessageConfirm) ? $MessageConfirm : ''; ?>
                    </label>
                </td>
            </tr>

            <tr class="m-0 p-0">
                <td class="m-0 p-0">
                </td>
                <td class="m-0 p-0">
                    <a href="index.php?page=user" class="btn btn-lg btn-warning fs-4" name="bt__userEdit--cancel">Retour</a>
                    <button type="submit" class="btn btn-lg btn-success fs-4" id="bt__userEdit_save" name="bt__userEdit_save">Enregistrer</button>
                    <button type="submit" class="btn btn-lg btn-info fs-4" id="bt__userEdit_new" name="bt__userEdit_new">Nouveau</button>
                    <button type="submit" class="btn btn-lg btn-danger fs-4" id="bt__userEdit_delete" name="bt__userEdit_delete">Supprimer</button>
                </td>
            </tr>

        </table>

    </form>

</section>

<?php
    $_SESSION['errorFormUser']=false;
?>

<script>
    
    document.getElementById('list_User_Type').addEventListener('change', function() {
        var selectedValue = this.value;

        // Envoie la nouvelle valeur au serveur via une requête AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'userEdit.controller.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Affichez la réponse du serveur dans la console pour le débogage
            }
        };
        xhr.send('userType=' + selectedValue);
    });

    document.getElementById('bt__userEdit_delete').addEventListener('click', function() {
        var userConfirmed = confirm("Êtes-vous sûr de vouloir supprimer cet enregistrement?");
    
            // Effectuer une requête AJAX pour communiquer avec le serveur
        
        if (userConfirmed === true) {
            //window.location.href = 'http://garageparrot/index.php?page=user_edit&deleteUser=true';
        }else{
            //window.location.href = 'http://garageparrot/index.php?page=user_edit&deleteUser=false';
        }
    });


</script>
