<?php
    include_once('../Controller/carEdit.controller.php');
?>

<section class="container">

    <form action="" method="post">
                
        <table class="w-100">

            <tr class="m-0 p-0">
                <td class="text-end m-0 p-0">
                    <label class="form-label m-0 p-0 pe-3" for="txt__Car--id_">ID</label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3" id="txt__Car--id_" name="txt__Car--id" type="text" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyCar->getId())){
                                echo $MyCar->getId();
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
                    <label class="form-label m-0 p-0 pe-3" for="txt--Name_Car">Nom<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Name_Car" name="txt--Name_Car" type="text" placeholder="Saisissez votre NOM" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyCar->getName())){
                                echo strtoupper($MyCar->getName());
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
                    <label class="form-label m-0 p-0 pe-3" for="txt--Surname_Car">Prénom<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Surname_Car" name="txt--Surname_Car" type="text" placeholder="Saisissez votre Prénom" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyCar->getSurname())){
                                echo ucfirst(strtolower($MyCar->getSurname()));
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
                    <label class="form-label m-0 p-0 pe-3" for="txt--Pseudo_Car">Pseudo<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Pseudo_Car" name="txt--Pseudo_Car" type="text" placeholder="Saisissez votre Pseudo" style="font-size: 1.6rem;"
                    value=
                        "<?php
                            if(!empty($MyCar->getPseudo())){
                                echo $MyCar->getPseudo();
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
                    <label class="form-label m-0 p-0 pe-3" for="txt--Email_Car">Email<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Email_Car" name="txt--Email_Car" type="email" placeholder="Saisissez votre courriel" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyCar->getEmail())){
                                if(filter_var($MyCar->getEmail(), FILTER_VALIDATE_EMAIL)){
                                    echo $MyCar->getEmail();
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
                    <label class="form-label m-0 p-0 pe-3" for="txt--Phone_Car">Phone<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Phone_Car" name="txt--Phone_Car" type="tel" placeholder="## ## ## ## ##" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyCar->getPhone())){
                                echo $MyCar->getPhone();
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
                    <label class="form-label m-0 p-0 pe-3" for="list--Car_Type">Utilisateur<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <select class="form-control-lg m-0 p-0 ps-3 w-100 border border-black" id="list_Car_Type" name="list_Car_Type" style="font-size: 1.6rem;">
                        <?php
                            $valeurDefault = isset($_POST['list_Car_Type']) ? htmlspecialchars($_POST['list_Car_Type']) : '';
                            if (!empty($MyCar->getType())){
                                $valeurDefault = $MyCar->getType();
                                $_SESSION['carType'] = $MyCar->getType();
                            }
                            echo "<option value=\"$valeurDefault\">$valeurDefault</option>";
                        ?>
                    <option value="Administrator">Administrator</option>
                    <option value="Customer">Customer</option>
                    <option value="Guest">Guest</option>
                    <option value="Car">Car</option>
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
                    <label class="form-label m-0 p-0 pe-3" for="txt--Password_Car">Mot de passe<span style="color:red;">*</span></label>
                </td>
                <td class="m-0 p-0">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Password_Car" name="txt--Password_Car" type="password" placeholder=""style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyCar->getPassword())){
                                echo $MyCar->getPassword();
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
                    <label class="form-label m-0 p-0 pe-3" for="txt--Confirm_Car">
                        Confirmation<span style="color:red;">*</span>
                    </label>
                </td>
                <td class="m-0 p-0 w-90">
                    <input class="form-control-lg m-0 p-0 ps-3 border border-black" id="txt--Confirm_Car" name="txt--Confirm_Car" type="password" placeholder="" style="font-size: 1.6rem;"
                        value=
                        "<?php
                            if(!empty($MyCar->getPassword())){
                                echo $MyCar->getPassword();
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
                    <a href="index.php?page=car" class="btn btn-lg btn-warning fs-4" name="bt__carEdit--cancel">Retour</a>
                    <button type="submit" class="btn btn-lg btn-success fs-4" id="bt__carEdit_save" name="bt__carEdit_save">Enregistrer</button>
                    <button type="submit" class="btn btn-lg btn-info fs-4" id="bt__carEdit_new" name="bt__carEdit_new">Nouveau</button>
                    <button type="submit" class="btn btn-lg btn-danger fs-4" id="bt__carEdit_delete" name="bt__carEdit_delete" onclick="confirmDelete()">Supprimer</button>
                </td>
            </tr>

        </table>

    </form>

</section>

<?php
    $_SESSION['errorFormCar']=false;
?>

<script>
    
    document.getElementById('list_Car_Type').addEventListener('change', function() {
        var selectedValue = this.value;

        // Envoie la nouvelle valeur au serveur via une requête AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_Car_type.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log(xhr.responseText); // Affichez la réponse du serveur dans la console pour le débogage
            }
        };
        xhr.send('carType=' + selectedValue);
    });

    // Affichez le message de confirmation avant suppression
    function confirmDelete() {

        if (confirm("Êtes-vous sûr de vouloir supprimer cette enregistrement?")) {

            //document.getElementById('confirmationForm').submit();
            document.getElementById('formCarEdit').submit();

        }

    }

</script>
