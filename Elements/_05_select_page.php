<article class="m-5 py-5 rounded-4 article__page--nbOfPage">
    <div class="div__nbLinePerPage" style="margin-right: 50px;">
        <form id="form__nbOfLine" method="post" action=<?php $pageActive ?>>
            <label for="nbOfLine" style="color: white;">Lines per page : </label>
            <select id="nbOfLine" name="nbOfLine" onchange="this.form.submit()">
                <option value=""<?php if (isset($_POST['nbOfLine']) && $_POST['nbOfLine']=='') echo 'selected';?>>Select number</option>
                <option value="4"<?php if (isset($_POST['nbOfLine']) && $_POST['nbOfLine']=='4') echo 'selected';?>>4</option>
                <option value="8"<?php if (isset($_POST['nbOfLine']) && $_POST['nbOfLine']=='8') echo 'selected';?>>8</option>
                <option value="12"<?php if (isset($_POST['nbOfLine']) && $_POST['nbOfLine']=='12') echo 'selected';?>>12</option>
                <option value="16"<?php if (isset($_POST['nbOfLine']) && $_POST['nbOfLine']=='16') echo 'selected';?>>16</option>
                <option value="20"<?php if (isset($_POST['nbOfLine']) && $_POST['nbOfLine']=='20') echo 'selected';?>>20</option>
                <option value="24"<?php if (isset($_POST['nbOfLine']) && $_POST['nbOfLine']=='24') echo 'selected';?>>24</option>
                <option value="48"<?php if (isset($_POST['nbOfLine']) && $_POST['nbOfLine']=='48') echo 'selected';?>>48</option>
                <option value="100"<?php if (isset($_POST['nbOfLine']) && $_POST['nbOfLine']=='100') echo 'selected';?>>100</option>
            </select>
        </form>
    </div>

    <form class="form__nbOfPage" method="post">
        <input class="BtPage" type="submit" name="previous" value="<"/>
        <input class="txtPage" type="text" name="txtPage" value="<?php echo $laPage; ?>"/>
        <label class="labelPage">&nbsp/&nbsp<?php echo $nbOfPage;?>&nbsp</label>
        <input class="BtPage" type="submit" name="next" value=">"/>
    </form>
</article>
