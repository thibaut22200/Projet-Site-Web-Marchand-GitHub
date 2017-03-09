<div class="container">
	<?php
	echo validation_errors();
	echo form_open('Visiteur/creationCompte', array('class' => "form-horizontal"));
	?>
	<div class="form-group">
		<label class="control-label col-sm-2">Nom d'utilisateur :</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" name="pseudo" value="<?php echo set_value('pseudo'); ?>"
				pattern="^([a-zA-Z]{2,10}[0-9]{0,5})$" placeholder="Entrez votre nom d'utilisateur" required >
			</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Nom :</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="nom" value="<?php echo set_value('nom'); ?>"
			pattern="^([a-zA-Z]{3,16}\-{0,1}[a-zA-Z]{3,16})$" placeholder="Entrez votre nom" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Prénom :</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="prenom" value="<?php echo set_value('prenom'); ?>"
			pattern="^([a-zA-Z]{3,16}\-{0,1}[a-zA-Z]{3,16})$" placeholder="Entrez votre prénom" required>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Adresse :</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="adresse" value="<?php echo set_value('adresse'); ?>"
			placeholder="Entrez votre adresse">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Code Postal :</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="codepostal" value="<?php echo set_value('codepostal'); ?>"
			pattern="^([0-9]{5})$" placeholder="Entrez votre code postal">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Ville :</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="ville" value="<?php echo set_value('ville'); ?>"
			pattern="^([a-zA-Z]{1,16}\-{0,1}[a-zA-Z]{1,16})$" placeholder="Entrez votre ville">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-2">Mot de passe :</label>
		<div class="col-sm-10">
			<input class="form-control" type="password" name="mdp" pattern="^([a-zA-Z0-9]{5,16})$"
			placeholder="Entrez votre mot de passe (5 caractères minimum, 16 maximum, pas de caractère spécial)" required>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-info btn-block" name="submit" value="S'inscrire" />
		</div>
	</div>
	</form>
</div>
</body>
