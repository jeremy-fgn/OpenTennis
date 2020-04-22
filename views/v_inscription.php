<?php require_once(PATH_VIEWS.'header.php') ?>

<?php require_once(PATH_VIEWS.'menu.php') ?>

<?php require_once(PATH_VIEWS.'alert.php') ?>



<div class="container">

	<h2><?=CREATION?></h2>

	<form action="index.php?page=inscription" method="POST" >
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputNomSignup"><?=NOM?></label>
				<input type="text" class="form-control"  name="inputNomSignup" id="inputNomSingup" placeholder="Nom">
			</div>

			<div class="form-group col-md-6">
				<label for="inputPrenomSignup"><?=PRENOM?></label>
				<input type="text" class="form-control" name="inputPrenomSignup" id="inputPrenomSignup" placeholder="Prénom">
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputMail"><?=EMAIL?></label>
				<input type="text" class="form-control" name="inputMail" id="inputMail" placeholder="monmail@blabla.com">
			</div>
			<div class="form-group col-md-6">
				<label for="inputPwd"><?=MDP?></label>
				<input type="password" class="form-control" name="inputPwd" id="inputPwd" placeholder="********">
			</div>
		</div>


		<button type="submit" class="btn btn-primary"><?=INSCRIRE?></button>

	</form>
  
</div>



<?php require_once(PATH_VIEWS.'footer.php') ?>