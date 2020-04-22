<?php require_once(PATH_VIEWS.'header.php') ?>

<?php require_once(PATH_VIEWS.'menu.php') ?>

<?php require_once(PATH_VIEWS.'alert.php') ?>

            
			<div class="mx-auto col-md-8 my-auto">
				<h2><?= CONNEXION ?></h2>
                <form action="index.php?page=connexion" method="post">
                    <div class="mb-3">
                        <label for="inputMail"><?= EMAIL ?></label>
                        <input type="email" class="form-control form-control-custom-connexion" name="inputMail" id="inputMail" placeholder="monmail@blabla.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="inputPwd"><?= MDP ?></label>
                        <input type="password" class="form-control form-control form-control-custom-connexion" name="inputPwd" id="inputPwdq" placeholder="*******" required>
                    </div>

                    <button class="btn btn-outline-custom btn-lg btn-primary btn-block" type="submit"><?= BTN_LOGIN ?></button>
                    <p class="mt-5 mb-3 text-muted text-center"><?= PAS_COMPTE ?><a href="index.php?page=inscription"><?= CREER_COMPTE ?></a></p>
                </form>
            </div> 


<?php require_once(PATH_VIEWS.'footer.php') ?>