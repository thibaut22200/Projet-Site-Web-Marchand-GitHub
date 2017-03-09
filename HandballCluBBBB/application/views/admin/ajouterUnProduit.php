<div class="container">
	<?php
	echo validation_errors();
	echo form_open('Admin/ajouterUnProduit', array('name' => 'formAjoutProduit','class' => 'form-horizontal'));
	?>


	<div class="form-group">
		<label class="control-label col-sm-2">Catégorie : </label>
		<div class="col-sm-10">
			<select name="catlist">
			<?php
			foreach ($lesCategories as $uneCategorie)
			{
				echo '<option value="' . $uneCategorie['NOCATEGORIE'] . '">' . $uneCategorie['LIBELLE'] . '</option>';
			}
			?>
			</select>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-sm-2">Marque : </label>
		<div class="col-sm-10">
			<select name="marquelist">
			<?php
			foreach ($lesMarques as $uneMarque)
			{
				echo '<option value="' . $uneMarque['NOMARQUE'] . '">' . $uneMarque['NOM'] . '</option>';
			}
			?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Libelle : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="libelle" value="<?php echo set_value('libelle'); ?>"
			 placeholder="Entrez le libelle" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Détail : </label>
		<div class="col-sm-10">
			<textarea rows="6" class="form-control" type="text" name="detail" value="<?php echo set_value('detail'); ?>"
			placeholder="Entrez le détail" required></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Prix HT : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="prixHT" value="<?php echo set_value('prixHT'); ?>"
			 placeholder="Entrez le prix HT" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Taux TVA : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="tauxTVA" value="<?php echo set_value('tauxTVA'); ?>"
			 placeholder="Entrez le taux TVA" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Nom image : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="nomImg" value="<?php echo set_value('nomImg'); ?>"
			placeholder="Entrez le nom de l'image" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Quantité en stock : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="quantite" value="<?php echo set_value('quantite'); ?>"
			 placeholder="Entrez la quantité en stock" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-info btn-block" name="submit" value="Ajouter le produit" />
		</div>
	</div>
	</form>
</div>
</body>
