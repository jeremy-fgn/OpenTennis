<!-- Menu du site -->
<nav class="navbar navbar-expand-lg">
	<div class="navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav w-100 d-flex align-items-center">

			<!-- OpenParc -->
			<div class="d-flex align-items-center justify-content-start nav-fixed-size">
				<li class="nav-item">
					<a class="nav-link" href="index.php"><img class="nav-image" src=<?= PATH_IMAGES . 'logo_open_parc.png' ?> alt="Logo open parc"></a>
				</li>
			</div>

			<!-- ACCUEIL + BILLETTERIE -->
			<div class="d-flex align-items-center justify-content-center nav-fixed-size">
				<li class="nav-item px-2">
					<a class="nav-link <?= ($page == TITRE_PAGE_ACCUEIL ? 'active' : '') ?>" href="index.php?page=accueil">
						<h3 class="nav-text"><?= MENU_ACCUEIL ?></h3>
					</a>
				</li>
				<li class="nav-item px-2">
					<a class="nav-link <?= ($page == TITRE_PAGE_BILLETTERIE ? 'active' : '') ?>" href="index.php?page=billetterie">
						<h3 class="nav-text"><?= MENU_BILLETTERIE ?></h3>
					</a>
				</li>
				<?php if (isset($utilisateur) and ($utilisateur->getIsAdmin() === true)) :  ?>
					<li class="nav-item px-2">
						<a class="nav-link <?= ($page == TITRE_PAGE_ADMIN ? 'active' : '') ?>" href="index.php?page=admin">
							<h3 class="nav-text"><?= MENU_ADMIN ?></h3>
						</a>
					</li>
				<?php endif; ?>

			</div>

			<!-- PANIER + CONNEXION -->
			<div class="d-flex align-items-center justify-content-end nav-fixed-size">
				<li class="nav-item">
					<a class="nav-link icon-link d-flex justify-content-end  <?= ($page == TITRE_PAGE_PANIER ? 'active' : '') ?>" href="index.php?page=panier"><i class="material-icons ">shopping_cart</i></a>
				</li>
				<li class="nav-item">
					<a class="nav-link <?= ($page == TITRE_PAGE_CONNEXION ? 'active' : '') ?>" href="index.php?page=<?= (isset($_SESSION['logged']) && $_SESSION['logged']) ?  'deconnexion' : 'connexion';  ?>">
						<h3 class="nav-text"><?= (isset($_SESSION['logged']) && $_SESSION['logged']) ?  DECONNEXION : CONNEXION; ?></h3>
					</a>
				</li>
			</div>

		</ul>
	</div>
</nav>