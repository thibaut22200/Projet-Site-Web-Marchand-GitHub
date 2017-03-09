<table class="table table-hover">
        <thead>
            <tr>
                <?php 
                foreach ($lesTitres as $unTitre) 
                {
                    echo '<th style="text-align: center;">' . $unTitre . '</th>';
                }?>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody style="text-align: center;">
            <?php 
                foreach ($clients as $unClient) 
                {
                    echo '<tr>';
                    echo '<td>' . $unClient['PSEUDO'] . '</td>';
                    echo '<td>' . $unClient['NOM'] . '</td>';
                    echo '<td>' . $unClient['PRENOM'] . '</td>';
                    echo '<td>' . $unClient['ADRESSE'] . '</td>';
                    echo '<td>' . $unClient['CODEPOSTAL'] . '</td>';
                    echo '<td>' . $unClient['VILLE'] . '</td>';
                    echo '<td>' . $unClient['MDP'] . '</td>';
                    echo '<td>' . $unClient['STATUT'] . '</td>';
                    echo '<td>' . anchor('Admin/modifierUnClient/' . $unClient['PSEUDO'], '<button class="btn btn-danger"><span class="glyphicon glyphicon-wrench"></span> Modifier</button>') . '</td>';
                    echo '<td>' . anchor('Admin/supprimerUnClient/' . $unClient['PSEUDO'], '<button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</button>') . '</td>';
                    echo '</tr>';
                }?>
        </tbody>
</table>