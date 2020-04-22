<?php require_once(PATH_VIEWS . 'header.php') ?>

<?php require_once(PATH_VIEWS . 'menu.php') ?>

<?php require_once(PATH_VIEWS . "alert.php"); ?>
<?php if (creationPanier()) : ?>
  <?php $nbArticles = count($_SESSION['panier']['idMatch']); ?>

  <?php if ($nbArticles <= 0) : ?>

    <h2 class="text-center p-5">Votre panier est vide</h2>

  <?php else : ?>
    <div class="container p-5">

      <h4 class="my-4">Votre panier</h4>
      <table class="table text-white">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre de tickets</th>
            <th scope="col">Prix/match</th>
            <th scope="col">Votre place</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i = 0; $i < $nbArticles; $i++) : ?>
            <tr>
              <th><?= $_SESSION['panier']['idMatch'][$i] ?></th>
              <td><?= $_SESSION['panier']['nbTicket'][$i] ?></td>
              <td><?= $_SESSION['panier']['prixMatch'][$i] ?></td>
              <?php if ($_SESSION['panier']['categorie'][$i] != 1) : ?>
                <td><?= $_SESSION['panier']['place'][$i] ?></td>
              <?php else : ?>
                <td> –––––––––– </td>
              <?php endif; ?>
              <td>
                <a href="index.php?page=panier&action=suppression&idMatch=<?= $_SESSION['panier']['idMatch'][$i] ?>" class="btn btn-outline-custom btn-primary">Retirer</a>
              </td>
            </tr>
          <?php endfor; ?>
      </table>
      <br>
      <form action="index.php?" method="get" class="d-flex my-5">
        <input type="hidden" name="page" value="panier">
        <input type="hidden" name="action" value="code">
        <input class="form-control-custom input-promo mx-1" type="text" placeholder="Code promo" id="example-number-input" name="code">
        <button class="btn btn-outline-custom">Ajouter la promotion</button>
      </form>
      <h3>Prix global : <?= $montantTotal ?></h3>

      <a href="index.php?page=achatCommande" class="btn btn-outline-custom btn-primary">Passer la commande</a>
      <a href="index.php?page=panier&action=annuler" class="btn btn-outline-custom btn-primary">Annuler</a>


    </div>

    <script>
      function getCode() {

        var code = document.getElementById("example-number-input").value;
        return code;
      }
    </script>
  <?php endif; ?>
<?php endif; ?>


<?php require_once(PATH_VIEWS . 'footer.php') ?>