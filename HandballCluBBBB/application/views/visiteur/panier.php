<?php 
if (!empty($panier)): ?>

<style type="text/css">
    img
    {
        height: auto;
        width: 75px;
    }
</style>
<?php echo form_open('Visiteur/voirPanier'); ?>

<table class="table table-hover">

<tr>
    <th></th>
    <th>Produit</th>
    <th>Quantité</th>
    <th>Prix TTC</th>
    <th>Total Produit</th>
    <th></th>
</tr>

<?php foreach ($panier as $article): ?>
    <tr>
        <td><img class="media-object" src="<?php echo img_url($article['img'])?>"></td>
        <td><?php echo $article['name']; ?></td>
        <td><?php echo anchor('Visiteur/quantiteMoins/'. $article['rowid'] . '/' . $article['qty'], '<span class="glyphicon glyphicon-triangle-left"></span>') . $article['qty'] . anchor('Visiteur/quantitePlus/'. $article['rowid'] . '/' . $article['qty'], '<span class="glyphicon glyphicon-triangle-right"></span>');?> </td>
        <td><?php echo $article['price'] . ' €'; ?></td>
        <td><?php echo $article['subtotal'] . ' €'; ?></td>
        <td><?php echo anchor('Visiteur/retirerArticle/'. $article['rowid'], 'Retirer <span class="glyphicon glyphicon-remove"></span>')?></td>
    </tr>
<?php endforeach; ?>

<tr>
        <td colspan="3"> </td>
        <td class="right"><b>Total</b></td>
        <td class="right"><?php echo $this->cart->format_number($this->cart->total()) . ' €'; ?></td>
        <td><?php echo anchor('Visiteur/passerCommande', '<button class="btn btn-danger">Commander</button>')?></td>
</tr>

</table>
</form>
<?php echo anchor('Visiteur/viderPanier', '<button class="btn btn-danger">Vider le panier</button>')?>
<?php else: ?>
    <h1 style="text-align: center;"> Votre panier est vide ! </h1>
<?php endif;?>