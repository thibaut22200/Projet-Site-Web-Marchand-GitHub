<div class="container">
	<?php
	echo validation_errors();
	echo form_open('Admin/ajouterUneMarque', array('class' => 'form-horizontal'));
	?>

	<div class="form-group">
		<label class="control-label col-sm-2">Nom de la marque : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="nomMarque" value="<?php echo set_value('nomMarque'); ?>"
			 placeholder="Entrez le nom de la marque" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-info btn-block" name="submit" value="Ajouter la marque" />
		</div>
	</div>
	</form>
</div>