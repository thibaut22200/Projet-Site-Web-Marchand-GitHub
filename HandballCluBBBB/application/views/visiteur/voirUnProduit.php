<style type="text/css">
	.col-sm-12
	{
		text-align: center;
		background-color: white;
	}
	img
	{
		height: 15%;
		width: 15%
	}
</style>
<a href="../listerLesProduits" class="btn btn-info" role="button">Retour à la liste des produits</a>
<?php 
if ($this->session->utilisateurStatut == 1) 
	{
		echo anchor('Admin/modifierUnProduit/'.$unProduit['NOPRODUIT'], '<button class="btn btn-danger"><span class="glyphicon glyphicon-pencil"></span> Modifier</button> ');
		echo anchor('Admin/supprimerUnProduit/'.$unProduit['NOPRODUIT'], '<button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Supprimer</button> ');
	}

	echo anchor('Visiteur/ajouterAuPanier/'.$unProduit['NOPRODUIT'], '<button class="btn btn-danger"><span class="glyphicon glyphicon-shopping-cart"></span> Ajouter au panier</button>');
?>
<br> <br>
<div class="row">
	<div class="col-sm-12">
		<?php
		echo img($unProduit["NOMIMAGE"]). '<br> <br>'; // Affiche directement l'image
		// Nota Bene : img_url($unArticle['cNomFichierImage']) aurait retourne l'url de l'image (cf. assets)
		echo '<h4>' . $unProduit["DETAIL"] . '</h4><br>';
		echo '<h2>' . $unProduit["PRIXHT"] . ' €</h2>';
		?>
	</div>
</div>