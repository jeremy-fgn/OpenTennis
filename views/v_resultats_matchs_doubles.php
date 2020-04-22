<div class="row row-match">
  <div class="container">

    <div class="text-center">
      <h1><?= TITRE_ROW_MATCHS_DOUBLES ?></h1>
    </div>

    <div class="match-wrapper d-flex align-items-center flex-column">
      <?php foreach ($matchsD as $md) : ?>

      <table class="table table-light">
      <thead class="thead-light">
        <tr>
          <th scope="col" class="text-center"><?=TITRE_ROW_INFOS?></th>
          <th scope="col" class="text-center"><?=JOUEURS?></th>
          <th scope="col" class="text-center"><?=BILLETS?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>
            <div class="match-result-item">
              <div class="d-flex align-items-start justify-content-center flex-column">
                <p class="py-1"><?= $ms->getDateMatch() ?></p>
                <p class="py-1"> Court <?= $ms->getCourt() ?></p>
              </div>
            </div>
          </th>
          <td>
            <div class="match-result-item">
              <p><?= $joueurDAO->getJoueur(($equipeDAO->getEquipe($md->getEquipe1()))->getIdJoueur1())->getNom() ?>, <?= $joueurDAO->getJoueur(($equipeDAO->getEquipe($md->getEquipe1()))->getIdJoueur2())->getNom() ?></p>
            </div>

            <div class="match-result-item">
              <p><?= $md->getHeureMatch() ?></p>
            </div>

            <div class="match-result-item">
              <p><?= $joueurDAO->getJoueur(($equipeDAO->getEquipe($md->getEquipe2()))->getIdJoueur1())->getNom() ?>, <?= $joueurDAO->getJoueur(($equipeDAO->getEquipe($md->getEquipe2()))->getIdJoueur2())->getNom() ?></p>
            </div>
          </td>
          <td>
            <div class="match-result-item d-flex align-items-center justify-content-center flex-row">
              <div class="ticket-category d-flex align-items-center justify-content-center flex-column px-1">
                <p><?=RDC?></p>
                <a href="index.php?page=achat&typeMatch=simple&categorie=3&idMatch=<?= $ms->getIdMatch() ?>&prixMatch=<?= $ms->get_prixNiv3() ?>" class='btn btn-outline-secondary' onclick="window.open(this.href, '', 
      'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=900, height=600'); return false;">ACHETER</a>
                <p><?= $ms->get_prixNiv3() ?></p>
              </div>
              <div class="ticket-category d-flex align-items-center justify-content-center flex-column px-1">
                <p><?=NUMEROTE?></p>
                <a href="index.php?page=achat&typeMatch=simple&categorie=2&idMatch=<?= $ms->getIdMatch() ?>&prixMatch=<?= $ms->get_prixNiv12() ?>" class='btn btn-outline-secondary' onclick="window.open(this.href, '', 
      'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=900, height=600'); return false;">ACHETER</a>
                <p><?= $ms->get_prixNiv12() ?></p>
              </div>
              <div class="ticket-category d-flex align-items-center justify-content-center flex-column px-1">
                <p><?=LIBRE?></p>
                <a href="index.php?page=achat&typeMatch=simple&categorie=1&idMatch=<?= $ms->getIdMatch() ?>&prixMatch=<?= $ms->get_prixNiv0() ?>" class='btn btn-outline-secondary' onclick="window.open(this.href, '', 
      'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=900, height=600'); return false;">ACHETER</a>
                <p><?= $ms->get_prixNiv0() ?></p>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
      </table>

      <?php endforeach; ?>
    </div>
  </div>
</div>