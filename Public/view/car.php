<?php
    include_once('../Controller/car.controller.php');
    include_once('../Elements/_05_select_page.php');
?>

<section class="m-5 d-flex flex-wrap justify-content-around">

<?php for($i=0;$i != count($Cars)-1;$i++) { ?>

<article class="mb-5 p-3 border rounded-4">
    <form action="/index.php?page=car_edit" method="post">
        <div class="d-flex justify-content-center div__Car--img">
            <a href="../img/vehicle/<?php echo $Cars[$i]['image1']; ?>" class="popup-gallery" data-fancybox="car-gallery-<?php echo $i; ?>">
                <img src="../img/vehicle/<?php echo $Cars[$i]['image1']; ?>" alt="Image du véhicule" style="width:350px;">
            </a>
            <a href="../img/vehicle/<?php echo $Cars[$i]['image2']; ?>" class="popup-gallery" data-fancybox="car-gallery-<?php echo $i; ?>"></a>
            <a href="../img/vehicle/<?php echo $Cars[$i]['image3']; ?>" class="popup-gallery" data-fancybox="car-gallery-<?php echo $i; ?>"></a>
            <a href="../img/vehicle/<?php echo $Cars[$i]['image4']; ?>" class="popup-gallery" data-fancybox="car-gallery-<?php echo $i; ?>"></a>
            <a href="../img/vehicle/<?php echo $Cars[$i]['image5']; ?>" class="popup-gallery" data-fancybox="car-gallery-<?php echo $i; ?>"></a>
        </div>

        <div class="div__Car--data">
            <table class='table__Car--data'>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">ID:</td>
                    <td class="tdText border border-0"><input type="text" name='txt__Car--id'  class="bgDark text-light text-start ps-2" readonly value='<?php echo $Cars[$i]['id_car'];?>'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Marque:</td>
                    <td class="tdText border border-0"><input type="text" name="txt__Car--Brand" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $Cars[$i]['brand'];?>'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Modèle:</td>
                    <td class="tdText border border-0"><input type="text" name="txt__Car--Model" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $Cars[$i]['model'];?>'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Moteur:</td>
                    <td class="tdText border border-0"><input type="text" name="txt__Car--Motorization" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $Cars[$i]['motorization'];?>'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Année:</td>
                    <td class="tdText border border-0"><input type="text" name="txt__Car--year" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $Cars[$i]['year'];?>'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Kilomètrage:</td>
                    <td class="tdText border border-0"><input type="text" name="txt__Car--mileage" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $Cars[$i]['mileage'];?> kms'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Price:</td>
                    <td class="tdText border border-0"><input type="text" name="txt__Car--price" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $Cars[$i]['price'];?> € TTC'></td>
                </tr>
                <tr>
                    <td class="tdLabel text-end border border-0 pe-1">Etat:</td>
                    <td class="tdText border border-0"><input type="text" name="txt__Car--sold" class="bg-secondary text-light text-start ps-2" readonly value='<?php echo $Cars[$i]['sold'];?>'></td>
                </tr>
            </table>
        </div>
        <div class="d-flex justify-content-center my-2">
            <button type="submit" class='btn btn-primary fs-3 mt-3' name='bt__Car--edit'>Editer</button>
        </div>
    </form>
</article>

<?php } ?>

</section>

<?php include_once('../Elements/_05_select_page.php');?>

<script>
    $(document).ready(function () {
        // Sélectionnez toutes les images avec la classe 'popup-gallery'
        $(".popup-gallery").on("click", function (e) {
            e.preventDefault(); // Empêche le comportement de clic par défaut

            // Ouvrez la fenêtre popup avec le diaporama
            $.fancybox.open({
                // Spécifiez ici les options du diaporama si nécessaire
                src: $(this).attr("href"),
                type: "image"
            });
        });
    });
    
    /*$(document).ready(function () {
        $('[data-fancybox]').fancybox({
            // Options Fancybox si nécessaire
        });
    });*/
</script>