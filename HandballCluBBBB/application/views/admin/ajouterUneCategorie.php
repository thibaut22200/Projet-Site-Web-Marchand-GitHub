<div class="container">
	<?php
	echo validation_errors();
	echo form_open('Admin/ajouterUneCategorie', array('class' => 'form-horizontal'));
	?>

	<div class="form-group">
		<label class="control-label col-sm-2">Nom de la catégorie : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="nomCat" value="<?php echo set_value('nomCat'); ?>"
			 placeholder="Entrez le nom de la catégorie" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-info btn-block" name="submit" value="Ajouter la catégorie" />
		</div>
	</div>
	</form>
</div>