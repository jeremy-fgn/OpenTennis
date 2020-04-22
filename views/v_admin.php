<?php require_once(PATH_VIEWS . 'header.php') ?>

<?php require_once(PATH_VIEWS . 'menu.php') ?>

<?php require_once(PATH_VIEWS . 'alert.php') ?>


<!-- Affichage tous les clients -->
<h4 class="p-5"><?= BIENVENUE.$utilisateur->getPrenom() ?> !</h4>



<!-- AFFICHAGE DES PROMOTIONS TABS -->
<div class="container mx-auto ">
    <!-- PROMOTIONS -->
    <?php foreach ($promos as $pm) : ?>
        <div class="card my-4">
            <h5 class="card-header text-dark"><?= $pm->get_promo() ?></h5>
            <div class="card-body d-flex flex-column">

                <form action="index.php" method="GET">
                    <div class="d-flex justify-content-around">
                        <input type="hidden" name="page" value="changePromo">
                        <p class="text-dark">
                            <?= PROMOTION ?>
                            <input class=" w-25 text-center" type="number" id="pour" name="pour" min="0" max="100" value="<?= $pm->get_pourcentage() ?>" /> %
                        </p>
                        <p class="text-dark"><?= NB_UTIL.$pm->get_nbUtilisation() ?></p>
                        <input type="hidden" name="id" value="<?= $pm->get_idPromotion() ?>">
                        <button type="submit" class="btn btn-outline-custom btn-primary" style="width: fit-content"><?=VALIDER?></button>
                    </div>
                </form>

            </div>
        </div>

    <?php endforeach; ?>

</div>


<?php require_once(PATH_VIEWS . 'footer.php') ?>