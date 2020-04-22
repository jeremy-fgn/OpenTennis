
<?php require_once(PATH_VIEWS.'header.php') ?>

<?php require_once(PATH_VIEWS.'menu.php') ?>

<?php require_once(PATH_VIEWS.'alert.php') ?>


<!-- Planning des matchs -->
<div class="row row-planning">
    <div class="container">
        <div class="d-flex align-items-center flex-column">
            <h1><?= TITRE_ROW_PLANNING ?></h1>
            <a href="index.php?page=billetterie_matchs" class="btn btn-outline-custom my-5" role="button" ><?= SUBMIT ?></a>
        </div>
    </div>
</div>

<!-- Choix du joueur -->
<div class="row row-players">
    <div class="container">
        <div class="d-flex align-items-center flex-column">
            <h1><?= TITRE_ROW_JOUEURS ?></h1>
            <form class="d-flex justify-content-center form-inline my-5 lg-0" method="POST" action="index.php?page=billetterie">
                <input class="form-control-custom mr-sm-2" type="text" name="recherche" placeholder=<?= SEARCH_PLACEHOLDER ?> aria-label=<?= SEARCH ?>>
            </form>

            <!-- VISUALISATION DES JOUEURS -->
            <div class="players-wrapper d-flex flex-wrap justify-content-center align-items-center rounded">

                 <?php $i=0;
                 foreach($joueurs as $jou): 
                 $i+=1;
                 ?>

                <a href=<?='index.php?page=billetterie_joueur&idjoueur='.$jou->getidUser()?>><div class="player-result <?= ($i%2==0 ? 'even':'')?> d-flex flex-column align-items-center justify-content-center my-4 mx-2 rounded">
                    <i class="material-icons">sports_tennis</i>
                    <p class="text-center pt-2"><?= $jou->getNom() ?></p>
                </div></a>
				<?php endforeach; ?>
								
            </div>
        </div>
    </div>
</div>


<?php require_once(PATH_VIEWS.'informations_billetterie.php') ?>
<?php require_once(PATH_VIEWS.'footer.php') ?>