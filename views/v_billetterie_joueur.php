
<?php require_once(PATH_VIEWS.'header.php') ?>

<?php require_once(PATH_VIEWS.'menu.php') ?>

<?php require_once(PATH_VIEWS.'alert.php') ?>

<!-- RETOUR -->
<div class="row row-retour">
  <a class="nav-link-multiple d-flex flex-row justify-content-start align-items-center" href="index.php?page=billetterie">
    <i class="material-icons">keyboard_arrow_left</i>
    <h2 class="nav-text"><?= RETOUR ?></h2>
  </a>
</div>

<!-- EXPLICATIONS BILLETS -->
<div class="row row-explications">
      <div class="d-flex align-items-start justify-content-start flex-row">
          <div class="col">
            <h4 class="text-center pb-1"><?= TITRE_ROW_EXPLICATIONS ?></h4>
            <p class="text-justify"><?= TEXTE_EXPLICATIONS ?></p>
          </div>
          <div class="col-7 d-flex align-items-center justify-content-center">
            <img src="<?= PATH_SCHEMA ?>" alt="<?= ALT_EXPLICATIONS_BILLETS ?>" class="rounded img-schema">
          </div>
      </div>
</div>

<!-- MATCHS SIMPLES -->
<?php require_once(PATH_VIEWS.'resultats_matchs_simples.php') ?>

<!-- MATCHS DOUBLES -->
<?php require_once(PATH_VIEWS.'resultats_matchs_doubles.php') ?>

<?php require_once(PATH_VIEWS.'informations_billetterie.php') ?>
<?php require_once(PATH_VIEWS.'footer.php') ?>