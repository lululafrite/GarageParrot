<article class="m-5 py-5 rounded-4 article__page--nbOfPage">
    <div class="div__nbLinePerPage" style="margin-right: 50px;">
        <form id="form__nbOfLine" method="post" action=<?php $pageActive ?>>
            <label for="nbOfLine" style="color: white;">ligne par page : </label>
            <select id="nbOfLine" name="nbOfLine" onchange="this.form.submit()">
                <option value="<?php
                    if(isset($_POST['nbOfLine']) && !isset($_POST['nbOfLine'])){
                        $value = $_POST['nbOfLine'];
                        $_SESSION['ligneParPage'] = $_POST['nbOfLine'];
                    }else{
                        $value = $_SESSION['ligneParPage'];
                    }
                    echo $value ;
                ?>">
                    <?php echo $value; ?>
                </option>
                <option value="1">1</option>
                <option value="3">3</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>

        </form>
    </div>

    <form class="form__nbOfPage" method="post">
        <input class="BtPage" type="submit" name="previous" value="<"/>
        <!-- <input class="txtPage" type="text" name="txtPage" value="<?php //echo $laPage; ?>"/> -->
        <label class="labelPage text-end"><?php echo $laPage; ?></label>
        <label class="labelPage">&nbsp/&nbsp<?php echo $nbOfPage;?>&nbsp</label>
        <input class="BtPage" type="submit" name="next" value=">"/>
    </form>
</article>
