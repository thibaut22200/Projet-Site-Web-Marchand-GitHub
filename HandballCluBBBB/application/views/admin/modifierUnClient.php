<div class="container">
	<?php
	echo validation_errors();
	echo form_open('Admin/modifierUnClient/'. $unClient["PSEUDO"], array('class' => 'form-horizontal'));
	?>


	<div class="form-group">
		<label class="control-label col-sm-2">Pseudo : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="pseudo" value="<?php echo $unClient['PSEUDO']?>" required>
		</div>
	</div>


	<div class="form-group">
		<label class="control-label col-sm-2">Nom : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="nom" value="<?php echo $unClient['NOM']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Prénom : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="prenom" value="<?php echo $unClient['PRENOM']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Adresse : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="adresse" value="<?php echo $unClient['ADRESSE']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Code Postal : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="codePostal" value="<?php echo $unClient['CODEPOSTAL']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Ville : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="ville" value="<?php echo $unClient['VILLE']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Mot de passe : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="mdp" value="<?php echo $unClient['MDP']?>" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Statut : </label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="statut" value="<?php echo $unClient['STATUT']?>" required>
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
