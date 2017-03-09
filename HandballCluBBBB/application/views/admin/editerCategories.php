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
                foreach ($lesCategories as $uneCategorie) 
                {
                    echo form_open('Admin/editerCategories');
                    echo '<tr>';
                    echo '<td><input type="text" name="numCategorie" value="' . $uneCategorie['NOCATEGORIE'] . '"></td>';
                    echo '<td><input type="text" name="libelle" value="' . $uneCategorie['LIBELLE'] . '"></td>';
                    echo '<td><input type="submit" class="btn btn-danger" name="submit" value="Supprimer" /></td>';
                    echo '</tr>';
                    echo '</form>';
                }?>
        </tbody>
</table>