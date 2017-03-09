<div class="container">
	<?php
	echo validation_errors();
	echo form_open('Visiteur/seConnecter', array('class' => "form-horizontal"));
	?>
	<div class="form-group">
		<label class="control-label col-sm-2">Nom d'utilisateur :</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="pseudo" value="<?php echo set_value('pseudo'); ?>"
				pattern="^([a-zA-Z]{2,10}[0-9]{0,5})$" placeholder="Entrez votre nom d'utilisateur" required >
			</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Mot de passe :</label>
		<div class="col-sm-10">
			<input class="form-control" type="password" name="mdp" pattern="^([a-zA-Z0-9]{5,16})$"
			placeholder="Entrez votre mot de passe" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-info btn-block" name="submit" value="Se connecter" />
		</div>
	</div>
	</form>
</div>