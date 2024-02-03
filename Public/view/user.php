<?php
    require('../Controller/user.controller.php');
    require('../Elements/_05_select_page.php');
?>

<section class="m-5 d-flex flex-wrap justify-content-between">

<?php for($i=0;$i != count($users)-1;$i++) { ?>

<article class="mb-5 p-3 border rounded-4">
    <form action="/index.php?page=user_edit" method="post">
        <div class="div__user--img">
            <table class='table__user--img'>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">ID:</td>
                    <td class="tdText border border-0"><input type="text" name='txt__user--id'  class="bgDark text-light text-start ps-2" readonly value='<?php echo $users[$i]['id_user'];?>'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Nom:</td>
                    <td class="tdText border border-0"><input type="text" name="txt__user--Name" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $users[$i]['name'];?>'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Prénom:</td>
                    <td class="tdText border border-0"><input type="text" name="txt__user--Surname" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $users[$i]['surname'];?>'></td>
                </tr>
            </table>
        </div>

        <div class="div__user--data">
            <table class='table__user--data'>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Pseudo:</td>
                    <td class="tdText border border-0"><input type="text" name="txt__user--pseudo" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $users[$i]['pseudo'];?>'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Email:</td>
                    <td class="tdText border border-0"><input type="email" name="txt__user--email" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $users[$i]['email'];?>'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Phone:</td>
                    <td class="tdText border border-0"><input type="tel" name="txt__user--phone" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $users[$i]['phone'];?>'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">type:</td>
                    <td class="tdText border border-0"><input type="tel" name="txt__user--type" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $users[$i]['type'];?>'></td>
                </tr>
            </table>
        </div>
        <div class="d-flex justify-content-center my-2">
            <button type="submit" class='btn btn-primary fs-3 mt-3' name='bt__user--edit'>edit</button>
        </div>
    </form>
</article>

<?php } ?>

</section>

<?php require('../Elements/_05_select_page.php');?>