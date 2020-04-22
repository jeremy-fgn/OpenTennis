<?php require_once(PATH_VIEWS . 'header.php') ?>

<?php require_once(PATH_VIEWS . 'menu.php') ?>

<?php require_once(PATH_VIEWS . 'alert.php') ?>




<div class="container">

  <h4 class="py-2"><?=MATCH_SELECT?></h4>
  <table class="table text-white">
    <thead>
      <tr>
        <th scope="col">N°</th>
        <th scope="col">Date</th>
        <th scope="col"><?= ($type == 'simple') ? 'Joueur 1' : 'Equipe 1' ?></th>
        <th scope="col"><?= ($type == 'simple') ? 'Joueur 2' : 'Equipe 2' ?></th>
        <th scope="col">N° Court</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th><?= $match->getIdMatch() ?></th>
        <td><?= $match->getDateMatch() ?></td>
        <td><?= $jou1 ?></td>
        <td><?= $jou2 ?></td>
        <td><?= $match->getCourt() ?></td>
      </tr>
  </table>



  <!-- CATEGORIE 3 -->
  <?php if ($categorie == 3) { ?>
    <div class="row row-achat d-flex flex-column justify-content-between align-items-center">

      <!-- SIEGES -->
      <form class="justify-content-center align-items-center rounded" method="post" action="<?= $page ?>">
        <div class="seats-wrapper d-flex flex-wrap">
          <p><?=TEXTE_PLACE?></p>
        </div>
      </form>
      <!-- AJOUTER DANS LE CONTROLLER LA GENERATION DE PLACES -->
      <div class="achat-item d-flex flex-row justify-content-start align-items-center">
        <p class="ml-2"><?= $match->get_prixNiv3() ?>€ / billet</p>
      </div>

      <a href="index.php?page=panier&action=ajout&idMatch=<?= $match->getIdMatch() ?>&prixMatch=<?= $match->get_prixNiv3() ?>&typeMatch=<?= $type ?>&categorie=<?= $categorie ?>" class="btn btn-outline-custom btn-primary my-2" id="sendToBasketButton">
      <?=AJOUTER_PANIER?>
      </a>
    </div>
  <?php } ?>


  <!-- CATEGORIE 1 2 -->
  <?php if ($categorie == 2) { ?>
    <!-- choix du gradin puis sieges
      ajouter (répéter la div avec un js)-->


    <!-- Code de CAT 3 -->
    <?php $i = 0;
    foreach ($emplacement as $e) :
      $i += 1; ?>
      <div class="checkbox-container d-flex justify-content-center align-items-center">
        <input type="checkbox" class="invisible-checkbox" name="check_list[]" value="<?= $e->get_idEmpl() ?>">
        <label class="seat-result text-center py-2 my-2 mx-3" id=<?= $e->get_idEmpl() ?>>
          <?= $e->get_place() ?>
        </label>
      </div>
    <?php endforeach; ?>
  <?php } ?>


  <!-- CATEGORIE 1 -->
  <?php if ($categorie == 1) { ?>
    <div class="row row-achat d-flex flex-column justify-content-between align-items-center">
      <div class="achat-item d-flex flex-row justify-content-start align-items-center">
        <input class="form-control-custom input-nb-billets" type="number" value="1" min="<?= MIN_NB_BILLETS ?>" max="<?= MAX_NB_BILLETS ?>" id="nb_billets" name="nbTicket">
        <p class="ml-2"><?= $match->get_prixNiv0() ?>€ / billet</p>
      </div>

      <a id="linkCat0" class="btn btn-primary my-2" href="index.php?page=panier&action=ajout&idMatch=<?= $match->getIdMatch() ?>&prixMatch=<?= $match->get_prixNiv0() ?>&typeMatch=<?= $type ?><?= ($categorie != '1') ? "&place=$places" : '' ?>&categorie=<?= $categorie ?>" onclick="getInputValue(); window.open(this.href, '', 
          'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=900, height=600'); return false;">Ajouter au panier</a>
    </div>


    <script>
      function getInputValue() {
        var nbTicket = document.getElementById("nb_billets").value;
        var href = $("#linkCat0").attr("href");
        href += "&nbTicket=" + nbTicket;
        window.location.href = href;
      }
    </script>

  <?php } ?>

</div>

<?php require_once(PATH_VIEWS . 'footer.php') ?>