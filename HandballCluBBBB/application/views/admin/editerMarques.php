<table class="table table-hover">
        <thead>
            <tr>
                <?php 
                foreach ($lesTitres as $unTitre) 
                {
                    echo '<th style="text-align: center;">' . $unTitre . '</th>';
                }?>
                <th></th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php 
                foreach ($lesMarques as $uneMarque) 
                {
                    echo form_open('Admin/editerMarques');
                    echo '<tr>';
                    echo '<td><input type="text" name="numMarque" value="' . $uneMarque['NOMARQUE'] . '"></td>';
                    echo '<td><input type="text" name="nom" value="' . $uneMarque['NOM'] . '"></td>';
                    echo '<td><input type="submit" class="btn btn-danger" name="submit" value="Supprimer" /></td>';
                    echo '</tr>';
                    echo '</form>';
                }?>
        </tbody>
</table>