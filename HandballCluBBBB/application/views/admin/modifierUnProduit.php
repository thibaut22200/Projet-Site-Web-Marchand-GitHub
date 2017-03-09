<div class="container">
	<?php
	echo validation_errors();
	echo form_open('Admin/modifierUnProduit/'. $unProduit["NOPRODUIT"], array('class' => 'form-horizontal'));
	?>


	<div class="form-group">
		<label class="control-label col-sm-2">Numéro Produit : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="noProduit" value="<?php echo $unProduit['NOPRODUIT']?>" required>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-sm-2">Numéro Catégorie : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="noCategorie" value="<?php echo $unProduit['NOCATEGORIE']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Numéro Marque : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="noMarque" value="<?php echo $unProduit['NOMARQUE']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Libelle : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="libelle" value="<?php echo $unProduit['LIBELLE']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Détail : </label>
		<div class="col-sm-10">
			<textarea rows="6" class="form-control" type="text" name="detail" required><?php echo $unProduit['DETAIL']?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Prix HT : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="prixHT" value="<?php echo $unProduit['PRIXHT']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Taux TVA : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="tauxTVA" value="<?php echo $unProduit['TAUXTVA']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Nom Image : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="nomImg" value="<?php echo $unProduit['NOMIMAGE']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Quantité en stock : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="quantite" value="<?php echo $unProduit['QUANTITEENSTOCK']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Date d'ajout : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="dateAjout" value="<?php echo $unProduit['DATEAJOUT']?>" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-info btn-block" name="submit" value="Appliquer" />
		</div>
	</div>
	</form>
</div>
</body>
