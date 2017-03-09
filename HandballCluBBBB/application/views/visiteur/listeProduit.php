<style type="text/css">
.row{
	text-align: center;
	font-weight: bold; 
}
a{
	color: white;
}
a:hover{
	color: white;
}
img{
	align-self: center;
	width: 20%
}
div.panel-body{
	height: 140px
}
</style>
<div class="row">
<?php
	foreach ($lesProduits as $unProduit)
	{
	echo '<div class="col-sm-4"><div class="panel panel-info"><div class="panel-heading">' .anchor('Visiteur/voirUnProduit/'.$unProduit->NOPRODUIT, $unProduit->LIBELLE).'</div><br>';
	echo '<div class="panel-body">' .anchor('Visiteur/voirUnProduit/'.$unProduit->NOPRODUIT,img($unProduit->NOMIMAGE)) . '</div>';
	echo '<div class="panel-footer">' . $unProduit->PRIXHT . ' € </div></div></div>';
	}
?>
</div>

<div class="text-center">
	<ul class="pagination">
		<?php echo $liensPagination?>
	</ul>
</div>